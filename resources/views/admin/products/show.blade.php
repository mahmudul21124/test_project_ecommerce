@extends('layouts.main')

@section('title')
    <title>Product Details</title>
@endsection

@section('css')
    @include('layouts.partials.css')
@endsection

@section('js')
    @include('layouts.partials.js')
@endsection

@section('content')
    <div class="page-content-wrapper sp-y">
        <div class="product-details-page-content">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Product Thumbnail Area -->
                            <div class="col-md-5">
                                <div class="product-thumb-area">
                                    <div class="product-details-thumbnail">
                                        <div class="product-thumbnail-slider" id="thumb-gallery">
                                            <figure class="pro-thumb-item"
                                                data-mfp-src="{{ asset('public/storage/' . $product->image) }}">
                                                <img src="{{ asset('public/storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" />
                                            </figure>
                                        </div>
                                        <a href="#thumb-gallery" class="btn-large-view btn-gallery-popup">
                                            View Larger <i class="fa fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Thumbnail Area -->

                            <!-- Product Info Area -->
                            <div class="col-md-7">
                                <div class="product-details-info-content-wrap">
                                    <div class="prod-details-info-content">
                                        <h2>{{ $product->name }}</h2>
                                        <h5 class="price">
                                            <strong>Price:</strong>
                                            <span class="price-amount">৳{{ $product->price }}</span>
                                        </h5>
                                        <p>{{ $product->description ?? 'No description available' }}</p>

                                        <div class="product-action">
                                            <div class="action-top d-sm-flex">
                                                <form action="{{ route('cart.add', $product->id) }}" method="POST"
                                                    class="d-flex">
                                                    @csrf
                                                    <div class="pro-qty mr-3 mb-4 mb-sm-0">
                                                        <label for="quantity" class="sr-only">Quantity</label>
                                                        <input type="number" id="quantity" name="quantity" value="1"
                                                            min="1" />
                                                    </div>
                                                    <button type="submit" class="btn btn-bordered">
                                                        Add to Cart
                                                    </button>
                                                </form>

                                            </div>
                                        </div>

                                        <div class="product-meta mt-3">
                                            <span class="sku_wrapper">SKU: <span class="sku">N/A</span></span>
                                            <span class="posted_in">Category: <a href="#">Shop</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Info Area -->
                        </div>

                        <!-- Product Description & Review Tabs -->
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="product-description-review">
                                    <!-- Tab Menu -->
                                    <ul class="nav nav-tabs desc-review-tab-menu" id="desc-review-tab" role="tablist">
                                        <li>
                                            <button class="active" id="desc-tab" type="button" data-bs-toggle="tab"
                                                data-bs-target="#descriptionContent" role="tab"
                                                aria-controls="descriptionContent" aria-selected="true">
                                                Description
                                            </button>
                                        </li>
                                        <li>
                                            <button id="review-tab" type="button" data-bs-toggle="tab"
                                                data-bs-target="#reviewContent" role="tab" aria-controls="reviewContent"
                                                aria-selected="false">
                                                Reviews
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab Content -->
                                    <div class="tab-content" id="myTabContent">
                                        <!-- Description -->
                                        <div class="tab-pane fade show active" id="descriptionContent" role="tabpanel"
                                            aria-labelledby="desc-tab">
                                            <div class="description-content">
                                                <p>{{ $product->description ?? 'No description available' }}</p>
                                            </div>
                                        </div>

                                        <!-- Reviews -->
                                        <div class="tab-pane fade" id="reviewContent" role="tabpanel"
                                            aria-labelledby="review-tab">
                                            <div class="product-rating-wrap">
                                                <div class="average-rating">
                                                    <h4>4.8 <span>(Overall)</span></h4>
                                                    <span>Based on 2 Comments</span>
                                                </div>

                                                <!-- Example static reviews -->
                                                <div class="display-ratings">
                                                    <div class="rating-item">
                                                        <div class="rating-author-pic">
                                                            <img src="{{ asset('public/assets/img/extra/author-1.jpg') }}"
                                                                alt="author" />
                                                        </div>
                                                        <div class="rating-author-txt">
                                                            <div class="rating-star">
                                                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="rating-meta">
                                                                <h3>Cristopher Lee</h3>
                                                                <span class="time">- 07, Jun</span>
                                                            </div>
                                                            <p>Wonderful collection of WooThemes classics! A must buy.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Review Form -->
                                                <div class="rating-form-wrapper mt-4">
                                                    <h3>Add your Review</h3>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <div class="rating-form row">
                                                            <div class="col-12">
                                                                <h5>Your Rating:</h5>
                                                                <div class="rating-star fix mb-20">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <input type="text" name="name"
                                                                        placeholder="Name" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <input type="email" name="email"
                                                                        placeholder="Email" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-input-item mt-30 mb-40">
                                                                    <textarea rows="4" name="review" placeholder="Write a review" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-22">
                                                                <button type="submit"
                                                                    class="btn btn-brand">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Reviews -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
