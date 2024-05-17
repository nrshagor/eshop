@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1>Welcome to Eshop</h1>
                    <p class="lead">Discover amazing products at great prices</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Shop Now</a>
                </div>
                <div class="col-lg-6">
                    <img src="banner.jpg" alt="Hero Banner" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Product Sections -->
    <section class="products mt-5">
        <div class="container">
            <h2 class="text-center mb-4">Explore Our Categories</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ asset('images/'.$product->image) }}" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-dark text-white py-3">
        <div class="container text-center">
            <p>&copy; 2024 Eshop. All rights reserved.</p>
        </div>
    </footer>
@endsection
