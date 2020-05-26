@extends('layout.index')
@section('content')
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('product.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') ? old('title') : $product->title  }}">
        </div>
        <div class="form-row">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') ? old('description') : $product->description }}">
        </div>
        <div class="form-row">
            <label>Price</label>
            <input type="number" min="1.0" step="0.01" name="price" class="form-control" value="{{ old('price') ? old('price') : $product->price }}">
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input type="number" min="0" name="stock" class="form-control" value="{{ old('stock') ? old('stock') : $product->stock }}">
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="custom-select" name="status">
                <option value="availible" {{ old('status') == 'availible' ? 'selected' : $product->status == 'availible' ? 'selected' : '' }}>Available</option>
                <option value="unavaible" {{ old('status') == 'unavaible' ? 'selected' : $product->status == 'unavaible' ? 'selected' : '' }}>Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Edit product</button>
        </div>
    </form>
@endsection
