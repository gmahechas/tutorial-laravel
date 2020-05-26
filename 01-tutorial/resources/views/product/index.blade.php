@extends('layout.index')
@section('content')
    <h1>List of Products</h1>

    <a href="{{ route('product.create') }}" class="btn btn-success">Create</a>

    @empty ($products)
        <div class="alert alert-warning">
            List of products is empty
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-stripe">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->status }}</td>
                            <td>
                                <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn btn-link">Show</a>
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-link">Edit</a>
                                <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
@endsection
