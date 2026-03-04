@extends('layouts.main')
@vite(['resources/css/product.css'])

@section('header-title', $product->name)

@section('content')
<div class="product-detail-container">
    <div class="product-detail-card">
        <div class="product-detail-image">
            @if($product->image)
                <img src="{{ asset('images/' . basename($product->image)) }}" 
                     alt="{{ $product->name }}">
            @else
                <div class="no-image-large">🍰</div>
            @endif
        </div>
        
        <div class="product-detail-info">
            <h1>{{ $product->name }}</h1>
            
            <div class="product-detail-price">
                {{ number_format($product->price, 0, '.', ' ') }} ₽
            </div>
            
            <div class="product-detail-description">
                <h3>Описание</h3>
                <p>{{ $product->description }}</p>
            </div>
            
            <div class="product-detail-stock">
                @if($product->stock > 0)
                    <span class="in-stock-large">✓ В наличии: {{ $product->stock }} шт.</span>
                    
                    @auth
                        <div class="quantity-selector">
                            <label for="quantity">Количество:</label>
                            <input type="number" id="quantity" min="1" max="{{ $product->stock }}" value="1">
                        </div>
                        
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" id="hidden-quantity" value="1">
                            <button type="submit" class="btn-add-to-cart-large">
                                🛒 Добавить в корзину
                            </button>
                        </form>
                    @else
                        <div class="quantity-selector">
                            <label>Количество:</label>
                            <input type="number" disabled value="1">
                        </div>
                        <a href="{{ route('login') }}" class="btn-add-to-cart-large" style="display: block; text-align: center; text-decoration: none;">
                            🔑 Войдите для покупки
                        </a>
                    @endauth
                @else
                    <span class="out-of-stock-large">✕ Нет в наличии</span>
                @endif
            </div>
            
            <div class="product-meta">
                <p>Артикул: #{{ $product->id }}</p>
                <p>Категория: {{ $product->category }}</p>
                @if($product->stock > 0)
                    <p>Доставка: 1-3 дня</p>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection