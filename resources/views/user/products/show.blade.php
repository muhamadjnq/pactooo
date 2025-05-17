@extends('layouts.user')
@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>

    <form action="{{ route('user.products.order', $product->id) }}" method="POST">
        @csrf
        <div>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" required>
        </div>

        @if($product->type === 'variable')
            <div>
                <label for="visit_count">Visit Count</label>
                <input type="number" name="visit_count" id="visit_count" min="1" required>
            </div>
        @endif

        <button type="submit">Order Now</button>
    </form>
</div>
@endsection
