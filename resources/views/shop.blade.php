@extends('layouts.main')

@section('title')
    <title>Shop</title>
@endsection

@section('css')
    @include('layouts.partials.css')
@endsection

@section('js')
    @include('layouts.partials.js')
@endsection

@section('content')
    <!--== Start Page Header Area ==-->
    {{-- <div class="page-header-wrap bg-img" data-bg="{{ asset('public/assets/img/bg/page-header-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <div class="page-header-content-inner">
                            <h1>Shop Left Sidebar</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="current"><a href="#">Shop</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-3 order-1 order-lg-0">
                    <div class="sidebar-area">

                        {{-- Recent Products --}}
                        <div class="sidebar-item">
                            <h4 class="sidebar-title">Recent Products</h4>
                            <div class="sidebar-body">
                                @foreach ($recentProducts as $product)
                                    <div class="sidebar-product">
                                        <a href="{{ route('products.show', $product->id) }}" class="image">
                                            @if ($product->image)
                                                <img src="{{ asset('public/storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" />
                                            @else
                                                <img src="{{ asset('public/images/nophoto.jpg') }}" alt="No image" />
                                            @endif
                                        </a>
                                        <div class="content">
                                            <a href="{{ route('products.show', $product->id) }}" class="title">
                                                {{ $product->name }}
                                            </a>
                                            <span class="price">৳{{ number_format($product->price, 2) }}</span>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Placeholder Categories (since not in schema) --}}
                        <div class="sidebar-item">
                            <h4 class="sidebar-title">Product Categories</h4>
                            <div class="sidebar-body">
                                <ul class="sidebar-list">
                                    <li><a href="{{ route('shop') }}">All Products</a></li>
                                    {{-- Add real categories once you extend schema --}}
                                </ul>
                            </div>
                        </div>

                        {{-- Placeholder Tags (since not in schema) --}}
                        <div class="sidebar-item">
                            <h4 class="sidebar-title">Product Tags</h4>
                            <div class="sidebar-body">
                                <ul class="tags">
                                    <li><a href="#">Sample Tag</a></li>
                                    {{-- Add real tags once you extend schema --}}
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-9 order-0 order-lg-1">
                    <div class="action-bar-inner mb-30">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="shop-layout-switcher mb-15 mb-sm-0">
                                    <ul class="layout-switcher nav">
                                        <li data-layout="grid" class="active"><i class="fa fa-th"></i></li>
                                        <li data-layout="list"><i class="fa fa-th-list"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="sort-by-wrapper">
                                    <label for="sort" class="sr-only">Sort By</label>
                                    <select name="sort" id="sort"
                                        onchange="window.location='{{ route('shop') }}?sort='+this.value">
                                        <option value="low_high" {{ request('sort') == 'low_high' ? 'selected' : '' }}>
                                            Price: Low to High
                                        </option>
                                        <option value="high_low" {{ request('sort') == 'high_low' ? 'selected' : '' }}>
                                            Price: High to Low
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-wrapper product-layout layout-grid">
                        <div class="row mtn-30">
                            @foreach ($products as $product)
                                <!-- Start Product Item -->
                                <div class="col-sm-6 col-lg-4 mb-4">
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

                                            <div class="ratting">
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star"></i></span>
                                                <span><i class="ion-android-star-half"></i></span>
                                            </div>
                                        </div>

                                        <div class="product-item__content">
                                            <div class="product-item__info">
                                                <h4 class="title">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>
                                                <span class="price"><strong>Price:</strong> ৳{{ $product->price }}</span>
                                            </div>

                                            {{-- ✅ Add to Cart form --}}
                                            <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                                class="mt-2 add-to-cart-form">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-sm btn-bordered">
                                                    <i class="ion-bag"></i> Add to Cart
                                                </button>
                                            </form>

                                            <div class="product-item__desc mt-2">
                                                <p>{{ $product->description ?? 'No description available' }}</p>
                                            </div>
                                        </div>

                                        {{-- Optional sale badge --}}
                                        @if ($product->discount)
                                            <div class="product-item__sale">
                                                <span class="sale-txt">{{ $product->discount }}%</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- End Product Item -->
                            @endforeach
                        </div>

                        {{-- Pagination --}}
                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->
@endsection
