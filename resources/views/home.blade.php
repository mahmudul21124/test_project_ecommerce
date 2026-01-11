@extends('layouts.main')

@section('title')
    <title>Home</title>
@endsection


@section('css')
    @include('layouts.partials.css')

    <style>
        .product-item {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            /* full width inside carousel cell */
            max-width: 250px;
            /* set a fixed max width for all cards */
            min-height: 380px;
            /* force equal height */
            margin: 0 auto;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 6px;
            overflow: hidden;
        }

        .product-item__thumb img {
            width: 100%;
            height: 200px;
            /* fixed image height */
            object-fit: cover;
            /* crop/scale images consistently */
        }

        .product-item__content {
            flex-grow: 1;
            padding: 10px;
            text-align: center;
        }

        .product-item__content h4.title {
            min-height: 40px;
            /* reserve space for product name */
            font-size: 16px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .product-item__content .price {
            display: block;
            margin-bottom: 10px;
        }

        .product-carousel {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
    </style>
@endsection

@section('js')
    @include('layouts.partials.js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.add-to-cart-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // stop normal reload

                    const url = form.action;
                    const formData = new FormData(form);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                            },
                            body: formData
                        })
                        .then(response => response.text())
                        .then(() => {
                            // ✅ Show success message
                            alert('Product added to cart!');

                            // ✅ Optionally update cart count in navbar
                            let cartCount = document.querySelector('#cart-count');
                            if (cartCount) {
                                cartCount.textContent = parseInt(cartCount.textContent) + 1;
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
        });
    </script>
@endsection


@section('content')
    <!--== Start Slider Area Wrapper ==-->
    <div class="slider-area-wrapper">
        <div class="slider-content-active">
            <div class="slider-slide-item bg-img" data-bg="{{ asset('public/images/slider_3.png') }}">
                <div class="container container-wide h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6">
                            <div class="slide-content">
                                <div class="slide-content-inner">
                                    <h3>NEW TECHNOLOGY & BUILD</h3>
                                    <h2>WHEELS &amp; TIRES COLLECTIONS</h2>
                                    <a class="btn btn-white" href="{{ route('shop') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-slide-item bg-img" data-bg="{{ asset('public/images/slider_2.png') }}">
                <div class="container container-wide h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-12">
                            <div class="slide-content">
                                <div class="slide-content-inner">
                                    <h3>NEW TECHNOLOGY & BUILD</h3>
                                    <h2>WHEELS &amp; TIRES <br> COLLECTIONS</h2>
                                    <a class="btn btn-white" href="{{ route('shop') }}">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Slider Area Wrapper ==-->

    <!--== Start Banner Area Wrapper ==-->
    <div class="banner-area-wrapper banner-mt">
        <div class="container container-wide">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="banner-item">
                        <div class="banner-item__img">
                            <a href="#"><img src="{{ asset('public/images/4.png') }}" alt="Banner" /></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="banner-item">
                        <div class="banner-item__img">
                            <a href="#"><img src="{{ asset('public/images/3.jpg') }}" alt="Banner" /></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="banner-item">
                        <div class="banner-item__img">
                            <a href="#"><img src="{{ asset('public/images/5.png') }}" alt="Banner" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Banner Area Wrapper ==-->

    <!--== Start Call to Action Area ==-->
    <div class="call-to-action-area sm-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="call-to-action-item mt-0">
                        <div class="call-to-action-item__icon">
                            <img src="{{ asset('public/assets/img/icons/icon-1.png') }}" alt="fast delivery">
                        </div>
                        <div class="call-to-action-item__info">
                            <h3>Free Home Delivery</h3>
                            <p>Provide free home delivery
                                for all product over $100</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="call-to-action-item">
                        <div class="call-to-action-item__icon">
                            <img src="{{ asset('public/assets/img/icons/icon-2.png') }}" alt="quality">
                        </div>
                        <div class="call-to-action-item__info">
                            <h3>Quality Products</h3>
                            <p>We ensure our product
                                quality all times</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-4">
                    <div class="call-to-action-item">
                        <div class="call-to-action-item__icon">
                            <img src="{{ asset('public/assets/img/icons/icon-3.png') }}" alt="return">
                        </div>
                        <div class="call-to-action-item__info">
                            <h3>Online Support</h3>
                            <p>To satisfy our customer we try
                                to give support online</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Call to Action Area ==-->

    <!--== Start Best Seller Products Area ==-->
    <div class="best-seller-products-area sm-top">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <div class="section-title">
                        <h2 class="h3">Best Seller</h2>
                        <p>All best seller product are now available for you and your can buy
                            this product from here any time any where so sop now</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-wrapper">
                        <div class="product-carousel">
                            @foreach ($products as $product)
                                <!-- Start Product Item -->
                                <div class="product-item">
                                    <div class="product-item__thumb">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img class="thumb-primary"
                                                src="{{ asset('public/storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" />
                                            <img class="thumb-secondary"
                                                src="{{ asset('public/storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" />
                                        </a>
                                    </div>

                                    <div class="product-item__content">
                                        <div class="ratting">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star-half"></i></span>
                                        </div>
                                        <h4 class="title">
                                            <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h4>
                                        <span class="price"><strong>Price:</strong> ৳{{ $product->price }}</span>

                                        {{-- Add to Cart button right after price --}}
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                            class="mt-2 add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-sm btn-bordered">
                                                <i class="ion-bag"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>



                                    {{-- Optional sale badge --}}
                                    @if (false)
                                        <div class="product-item__sale">
                                            <span class="sale-txt">25%</span>
                                        </div>
                                    @endif
                                </div>
                                <!-- End Product Item -->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Best Seller Products Area ==-->


    <!--== Start Products Area Wrapper ==-->
    <div class="products-area-wrapper sm-top">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <div class="section-title">
                        <h2 class="h3">All Of Our Products</h2>
                        <p>All best seller product are now available for you and your can buy
                            this product from here any time any where so sop now</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-wrapper columns-5">
                        @foreach ($products as $product)
                            <!-- Start Product Item -->
                            <div class="col">
                                <div class="product-item">
                                    <div class="product-item__thumb">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img class="thumb-primary" src="{{ asset('public/storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" />
                                            <img class="thumb-secondary" src="{{ asset('public/storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" />
                                        </a>
                                    </div>

                                    <div class="product-item__content">
                                        <div class="ratting">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star-half"></i></span>
                                        </div>
                                        <h4 class="title">
                                            <a href="{{ route('products.show', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </h4>
                                        <span class="price"><strong>Price:</strong> ৳{{ $product->price }}</span>

                                        {{-- Add to Cart button right after price --}}
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                            class="mt-2 add-to-cart-form">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-sm btn-bordered">
                                                <i class="ion-bag"></i> Add to Cart
                                            </button>
                                        </form>
                                    </div>


                                    {{-- Optional sale badge --}}
                                    @if (false)
                                        <div class="product-item__sale">
                                            <span class="sale-txt">25%</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- End Product Item -->
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">
                            <i data-feather="eye" class="align-self-center icon-xs mr-1"></i> View More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Products Area Wrapper ==-->

    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area sm-top sm-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-logo-content">
                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_1.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_2.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_3.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_4.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_5.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_6.png') }}" alt="Logo" /></a>
                        </div>

                        <div class="brand-logo-item">
                            <a href="#"><img src="{{ asset('public/images/brand_7.png') }}" alt="Logo" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Brand Logo Area Wrapper ==-->
@endsection
