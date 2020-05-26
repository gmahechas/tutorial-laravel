@extends('layout.index')
@section('content')
    <h1>Create Product</h1>
    <form method="POST" action="{{ route('product.store') }}">
        @csrf
        <div class="form-row">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="form-row">
            <label>Description</label>
            <input type="text" name="description" class="form-control" value="{{ old('description') }}">
        </div>
        <div class="form-row">
            <label>Price</label>
            <input type="number" min="1.0" step="0.01" name="price" class="form-control" value="{{ old('price') }}">
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input type="number" min="0" name="stock" class="form-control" value="{{ old('stock') }}">
        </div>
        <div class="form-row">
            <label>Status</label>
            <select class="custom-select" name="status">
                <option value="" selected>Select...</option>
                <option {{ old('status') == 'availible' ? 'selected' : '' }} value="availible">Available</option>
                <option {{ old('status') == 'unavaible' ? 'selected' : '' }} value="unavaible">Unavailable</option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create product</button>
        </div>
    </form>
@endsection
