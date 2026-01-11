@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content')
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input name="price" type="number" step="0.01" value="{{ $product->price }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Image</label><br>
            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mb-2">
            <input name="image" type="file" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
