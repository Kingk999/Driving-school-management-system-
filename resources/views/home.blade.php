@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
<div class="container mt-5">
    <div class="jumbotron bg-light text-center p-5 rounded shadow">
        <h1 class="display-4 text-primary">Welcome to the Driving Management System!</h1>
        <p class="lead text-secondary mt-3">We offer the best services aide you in acquiring your license 
            and becoming a good driver.</p>
        <hr class="my-4">
        <p class="text-muted">Get started by exploring the options below:</p>
        <div class="mt-4">
            <a class="btn btn-primary btn-lg me-2" href="{{ route('products.index') }}" role="button">View Products</a>
            <a class="btn btn-outline-secondary btn-lg" href="{{ route('categories.index') }}" role="button">View Categories</a>
        </div>
    </div>
</div>
@endsection