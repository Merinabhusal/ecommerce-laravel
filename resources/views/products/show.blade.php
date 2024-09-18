@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $product->photopath }}" alt="{{ $product->product_name }}" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->description }}</p>
            <h4>${{ $product->price }}</h4>

            <!-- Add to Cart Form -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" class="form-control" min="1">
                </div>

                <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
            </form>
        </div>
    </div>

    <!-- Back to Products Button -->
    <div class="row mt-4">
        <div class="col-md-12">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </div>
    </div>
</div>
@endsection






