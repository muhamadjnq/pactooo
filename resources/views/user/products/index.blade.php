@extends('layouts.user')
@section('content')
<div class="container">
    <h1>Products</h1>
    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>
        <ul>
            @foreach($category->products as $product)
                <li>
                    <a href="{{ route('user.products.show', $product->slug) }}">{{ $product->name }}</a>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
@endsection
