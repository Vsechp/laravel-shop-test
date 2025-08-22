@extends('layouts.app')

@section('title', $product->name . ' - Купить за ' . number_format($product->price, 0, ',', ' ') . 'P')
@section('description', $product->description . ' Цена: ' . number_format($product->price, 0, ',', ' ') . 'P. Быстрая доставка, гарантия качества.')

@section('content')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category', $product->category) }}">{{ $product->category->name }}</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>
        <h1 class="mb-4">Карточка товара</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <div class="product-detail-image" style="background-image: url('{{ asset($product->image) }}');">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-detail-image">
            </div>
        @else
            <div class="product-detail-image">
                ФОТО ТОВАРА
            </div>
        @endif
    </div>
    <div class="col-md-6">
        <div class="product-info">
            <div class="product-name">{{ $product->name }} XL-{{ $product->id }}</div>
            <div class="product-price">{{ number_format($product->price, 0, ',', ' ') }}P</div>
            <button class="btn btn-success add-to-cart-btn add-to-cart" data-product-id="{{ $product->id }}">
                В корзину
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="product-description">
            <p>{{ $product->description }}</p>
            <p>Этот товар является примером качественного продукта. Он демонстрирует, как можно кратко и информативно представить продукт, выделяя его ключевые особенности и преимущества. Описание включает нейтральный тон, четкую структуру и убедительные формулировки, чтобы заинтересовать покупателя.</p>
        </div>
    </div>
</div>

@endsection
