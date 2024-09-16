@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Product Details
    </div>
    <div class="card-body">
        <h3>{{ $product->name }}</h3>
        <p><strong>Description:</strong> {{ $product->description }}</p> <!-- Description is shown here -->
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
</div>
@endsection
