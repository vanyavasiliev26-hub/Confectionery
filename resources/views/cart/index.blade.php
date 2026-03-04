{{-- resources/views/cart/index.blade.php --}}
@extends('layouts.main')
@vite(['resources/css/cart.css'])

@section('header-title', 'Корзина')

@section('content')
<div class="cart-container">
    <h1 class="cart-title">Ваша корзина</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if(empty($cart))
        <div class="empty-cart">
            <div class="empty-cart-icon">🛒</div>
            <h2>Корзина пуста</h2>
            <p>Добавьте сладости в корзину</p>
            <a href="{{ route('catalog') }}" class="btn-catalog">Перейти в каталог</a>
        </div>
    @else
        <div class="cart-content">

            <div class="cart-items">
                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="cart-item">
                        <div class="cart-item-image">
                            @if($item['image'])
                                <img src="{{ asset('images/' . basename($item['image'])) }}" alt="{{ $item['name'] }}">
                            @else
                                <div class="no-image">🍰</div>
                            @endif
                        </div>

                        <div class="cart-item-info">
                            <h3 class="cart-item-title">{{ $item['name'] }}</h3>
                            <div class="cart-item-price">{{ number_format($item['price'], 0, '.', ' ') }} ₽</div>

                            <div class="cart-item-quantity">
                                <form action="{{ route('cart.update') }}" method="POST" class="quantity-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <div class="quantity-control">
                                        <button type="button" class="quantity-btn minus" onclick="decrement(this)">−</button>
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input" onchange="this.form.submit()">
                                        <button type="button" class="quantity-btn plus" onclick="increment(this)">+</button>
                                    </div>
                                </form>

                                <form action="{{ route('cart.remove') }}" method="POST" class="remove-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $id }}">
                                    <button type="submit" class="btn-remove">Удалить</button>
                                </form>
                            </div>

                            <div class="cart-item-subtotal">
                                Сумма: <strong>{{ number_format($subtotal, 0, '.', ' ') }} ₽</strong>
                            </div>
                        </div>
                    </div>
                @endforeach

                <form action="{{ route('cart.clear') }}" method="POST" class="clear-cart-form">
                    @csrf
                    <button type="submit" class="btn-clear" onclick="return confirm('Очистить корзину?')">
                        Очистить корзину
                    </button>
                </form>
            </div>


            <div class="cart-summary">
                <h2>Ваш заказ</h2>
                
                <div class="summary-row">
                    <span>Товаров:</span>
                    <span>{{ count($cart) }} шт.</span>
                </div>

                <div class="summary-row total">
                    <span>Итого:</span>
                    <span class="total-price">{{ number_format($total, 0, '.', ' ') }} ₽</span>
                </div>


                <a href="{{ route('order.checkout') }}" class="btn-checkout">
                    Оформить заказ
                </a>

                <a href="{{ route('catalog') }}" class="continue-shopping">
                    ← Продолжить покупки
                </a>
            </div>
        </div>
    @endif
</div>


@endsection