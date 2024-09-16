@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add New Product
    </div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name" required>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" placeholder="Enter product description" required></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Enter product price" required>

            </div>
            <br>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control" id="category" required>
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
