@extends('layouts.main')
@vite(['resources/css/catalog.css'])
@section('header-title', 'Каталог товаров')

@section('content')
<div class="catalog-container">
    <h1 class="catalog-title">Наши сладости</h1>
    
    <div class="categories-nav">
        <a href="{{ route('catalog') }}" class="category-link {{ !request('category') ? 'active' : '' }}">
            Все товары
        </a>
        <a href="{{ route('catalog', ['category' => 'Торты']) }}" 
           class="category-link {{ request('category') == 'Торты' ? 'active' : '' }}">
            🎂 Торты
        </a>
        <a href="{{ route('catalog', ['category' => 'Пирожные']) }}" 
           class="category-link {{ request('category') == 'Пирожные' ? 'active' : '' }}">
            🧁 Пирожные
        </a>
        <a href="{{ route('catalog', ['category' => 'Капкейки']) }}" 
           class="category-link {{ request('category') == 'Капкейки' ? 'active' : '' }}">
            🧁 Капкейки
        </a>
        <a href="{{ route('catalog', ['category' => 'Печенье']) }}" 
           class="category-link {{ request('category') == 'Печенье' ? 'active' : '' }}">
            🍪 Печенье
        </a>
    </div>


    @if(request('category'))
        <div class="category-header">
            <h2>{{ request('category') }}</h2>
            <p>Вкуснейшие {{ strtolower(request('category')) }} от нашей кондитерской</p>
        </div>
    @endif

    @if($products->isEmpty())
        <div class="empty-catalog">
            <p>В этой категории пока нет товаров</p>
        </div>
    @else
        <div class="products-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product->image && file_exists(public_path('images/' . $product->image)))
                            <img src="{{ asset('images/' . $product->image) }}" 
                                 alt="{{ $product->name }}">
                        @else
                            <div class="no-image">🍰</div>
                        @endif
                    </div>
                    
                    <div class="product-info">
                        <span class="product-category">{{ $product->category }}</span>
                        
                        <h3 class="product-title">
                            <a href="{{ route('product.show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                        </h3>
                        
                        <p class="product-description">
                            {{ Str::limit($product->description, 80) }}
                        </p>
                        
                        <div class="product-footer">
                            <span class="product-price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
                            
                            @auth
                                @if($product->stock > 0)
                                    <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn-add-to-cart">
                                            🛒 В корзину
                                        </button>
                                    </form>
                                @else
                                    <span class="out-of-stock">Нет в наличии</span>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn-login-to-cart">
                                    🔑 Войти
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>



@endsection