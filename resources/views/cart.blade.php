@extends('layouts.main')

@section('title')
    <title>Cart</title>
@endsection

@section('css')
    @include('layouts.partials.css')
@endsection

@section('js')
    @include('layouts.partials.js')
@endsection

@section('content')
    <div class="page-content-wrapper sp-y">
        <div class="cart-page-content-wrap">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-cart-list-area">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <div class="shopping-cart-table table-responsive">
                                    <table class="table table-bordered text-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $subtotal = 0; @endphp
                                            @forelse ($cart as $id => $item)
                                                @php
                                                    $lineTotal = $item['price'] * $item['quantity'];
                                                    $subtotal += $lineTotal;
                                                @endphp
                                                <tr data-price="{{ $item['price'] }}">
                                                    <td class="product-list">
                                                        <div class="cart-product-item d-flex align-items-center">
                                                            <div class="remove-icon">
                                                                <a href="{{ url('/remove-from-cart/' . $id) }}"
                                                                    class="text-danger">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </div>
                                                            <a href="{{ route('products.show', $id) }}"
                                                                class="product-thumb">
                                                                <img src="{{ asset('public/storage/' . $item['image']) }}"
                                                                    alt="{{ $item['name'] }}" width="60" />
                                                            </a>
                                                            <a href="{{ route('products.show', $id) }}"
                                                                class="product-name">
                                                                {{ $item['name'] }}
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>৳{{ number_format($item['price'], 2) }}</td>
                                                    <td>
                                                        <div class="pro-qty">
                                                            <input type="number" name="quantities[{{ $id }}]"
                                                                value="{{ $item['quantity'] }}" min="1"
                                                                class="form-control w-50 mx-auto qty-input" />
                                                        </div>
                                                    </td>
                                                    <td class="line-total">৳{{ number_format($lineTotal, 2) }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">Your cart is empty.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                                <div
                                    class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center mt-3">
                                    <div class="coupon-form-wrap">
                                        <form action="#" method="post">
                                            <label for="coupon" class="sr-only">Coupon Code</label>
                                            <input type="text" id="coupon" placeholder="Coupon Code" />
                                            <button class="btn-apply">Apply</button>
                                        </form>
                                    </div>

                                    <div class="cart-update-buttons mt-15 mt-sm-0">
                                        <button type="submit" class="btn btn-update-cart">Update Cart</button>
                                        <a href="{{ route('shop') }}" class="btn-clear-cart">Continue Shopping</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Cart Calculate Area -->
                        <div class="cart-calculate-area mt-sm-40 mt-md-60">
                            <h5 class="cal-title">Cart Totals</h5>
                            <div class="cart-cal-table table-responsive">
                                <table class="table table-borderless">
                                    <tr class="cart-sub-total">
                                        <th>Subtotal</th>
                                        <td>৳{{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td>
                                            <ul class="shipping-method">
                                                <li>
                                                    <div class="form-check">
                                                        <input type="radio" id="flat_shipping" name="shipping_method"
                                                            class="form-check-input" checked />
                                                        <label class="form-check-label" for="flat_shipping">
                                                            Flat Rate : ৳100
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input type="radio" id="free_shipping" name="shipping_method"
                                                            class="form-check-input" />
                                                        <label class="form-check-label" for="free_shipping">
                                                            Free Shipping
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><b>৳{{ number_format($subtotal + 100, 2) }}</b></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="proceed-checkout-btn">
                                <a href="{{ url('/checkout') }}" class="btn btn-brand d-block">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Live update script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInputs = document.querySelectorAll('.qty-input');

            qtyInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const row = input.closest('tr');
                    const price = parseFloat(row.dataset.price);
                    const quantity = parseInt(input.value) || 1;

                    // Update line total
                    const lineTotalCell = row.querySelector('.line-total');
                    const lineTotal = price * quantity;
                    lineTotalCell.textContent = '৳' + lineTotal.toFixed(2);

                    // Update subtotal
                    let subtotal = 0;
                    document.querySelectorAll('.line-total').forEach(cell => {
                        subtotal += parseFloat(cell.textContent.replace(/[^\d.]/g, '')) ||
                        0;
                    });

                    document.querySelector('.cart-sub-total td').textContent = '৳' + subtotal
                        .toFixed(2);

                    // Update grand total (with flat shipping 100)
                    const grandTotal = subtotal + 100;
                    document.querySelector('.order-total td b').textContent = '৳' + grandTotal
                        .toFixed(2);
                });
            });
        });
    </script>
@endsection
