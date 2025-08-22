@extends('layouts.app')

@section('title', $category->name . ' - Купить в интернет-магазине')
@section('description', 'Товары в категории ' . $category->name . '. Широкий выбор, низкие цены, быстрая доставка.')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item active">{{ $category->name }}</li>
            </ol>
        </nav>
        <h1 class="mb-4">{{ $category->name }}</h1>
    </div>
</div>

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="product-card">
            <a href="{{ route('product', $product) }}" style="text-decoration: none; color: inherit;">
                @if($product->image)
                    <div class="product-image-placeholder" style="background-image: url('{{ asset($product->image) }}');">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
                    </div>
                @else
                    <div class="product-image-placeholder">
                        ФОТО ТОВАРА
                    </div>
                @endif
            </a>
            <div class="product-info">
                <a href="{{ route('product', $product) }}" style="text-decoration: none; color: inherit;">
                    <div class="product-name">{{ $product->name }}</div>
                    <div class="product-id">XL-{{ $product->id }}</div>
                </a>
                <div class="product-price">{{ number_format($product->price, 0, ',', ' ') }}P</div>
                <button class="btn btn-success add-to-cart-btn add-to-cart" data-product-id="{{ $product->id }}">
                    В корзину
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        {{ $products->links() }}
    </div>
</div>

@endsection
