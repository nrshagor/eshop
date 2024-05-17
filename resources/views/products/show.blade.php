<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $product->name }}</h2>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
        <p><strong>Status:</strong> {{ $product->status }}</p>
        <p><strong>Image:</strong></p>
        <img src="{{ asset('images/'.$product->image) }}" alt="Product Image" style="max-width: 300px;">
        <br><br>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
