@extends('admin.system')

@section('title')
    <title>Products</title>
@endsection

@section('css')
    @include('admin.layouts.css')
@endsection

@section('js')
    @include('admin.layouts.js')
@endsection


@section('breadcrumb')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Products</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center">
                        <a href="#" class="btn btn-sm btn-outline-primary" id="Product_Date">
                            <span class="ay-name" id="Day_Name">Today:</span>&nbsp;
                            <span class="" id="Select_date">{{ now()->format('M d') }}</span>
                            <i data-feather="calendar" class="align-self-center icon-xs ml-1"></i>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-primary">
                            <i data-feather="download" class="align-self-center icon-xs"></i>
                        </a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div><!--end row-->
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Products</h4>
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">
                            <i data-feather="plus" class="align-self-center icon-xs mr-1"></i> Add Product
                        </a>
                    </div>
                </div><!--end card-header-->

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('public/storage/' . $product->image) }}" width="60"></td>
                                        <td>{{ $product->name }}</td>
                                        <td>৳{{ $product->price }}</td>
                                        <td>
                                            <a href="{{ route('products.show', $product) }}"
                                                class="btn btn-sm btn-info">Show</a>

                                            <a href="{{ route('products.edit', $product) }}"
                                                class="btn btn-sm btn-warning">Edit</a>

                                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table><!--end /table-->
                    </div><!--end /tableresponsive-->

                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $products->links() }}
                    </div>

                </div><!--end card-body-->
            </div><!--end card-->
        </div> <!-- end col -->

    </div> <!-- end row -->
@endsection
