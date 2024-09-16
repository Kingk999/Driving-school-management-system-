@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Add Category
    </div>
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter category name" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Add Category</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
