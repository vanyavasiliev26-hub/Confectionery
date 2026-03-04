@extends('layouts.main')

@section('header-title', 'Оформление заказа')

@section('content')
<div class="checkout-container">
    <h1 class="checkout-title">Оформление заказа</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="checkout-content">

        <div class="checkout-form">
            <form method="POST" action="{{ route('order.store') }}">
                @csrf

                <div class="form-section">
                    <h2>Контактные данные</h2>
                    
                    <div class="form-group">
                        <label for="customer_name">Имя получателя *</label>
                        <input type="text" 
                               id="customer_name" 
                               name="customer_name" 
                               class="form-control @error('customer_name') is-invalid @enderror"
                               value="{{ old('customer_name', Auth::user()->name) }}"
                               required>
                        @error('customer_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон *</label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="form-control @error('phone') is-invalid @enderror"
                               value="{{ old('phone') }}"
                               placeholder="+7 (999) 123-45-67"
                               required>
                        @error('phone')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h2>Доставка</h2>
                    
                    <div class="form-group">
                        <label for="address">Адрес доставки *</label>
                        <textarea id="address" 
                                  name="address" 
                                  class="form-control @error('address') is-invalid @enderror"
                                  rows="3"
                                  required>{{ old('address') }}</textarea>
                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-section">
                    <h2>Способ оплаты</h2>
                    
                    <div class="payment-methods">
                        <div class="payment-method">
                            <input type="radio" 
                                   id="payment_cash" 
                                   name="payment_method" 
                                   value="cash"
                                   {{ old('payment_method') == 'cash' ? 'checked' : '' }}
                                   required>
                            <label for="payment_cash">
                                <span class="payment-icon">💵</span>
                                <span>Наличными при получении</span>
                            </label>
                        </div>

                        <div class="payment-method">
                            <input type="radio" 
                                   id="payment_card" 
                                   name="payment_method" 
                                   value="card"
                                   {{ old('payment_method') == 'card' ? 'checked' : '' }}>
                            <label for="payment_card">
                                <span class="payment-icon">💳</span>
                                <span>Картой при получении</span>
                            </label>
                        </div>

                        <div class="payment-method">
                            <input type="radio" 
                                   id="payment_online" 
                                   name="payment_method" 
                                   value="online"
                                   {{ old('payment_method') == 'online' ? 'checked' : '' }}>
                            <label for="payment_online">
                                <span class="payment-icon">🌐</span>
                                <span>Онлайн оплата</span>
                            </label>
                        </div>
                    </div>
                    @error('payment_method')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-section">
                    <h2>Комментарий к заказу (необязательно)</h2>
                    
                    <div class="form-group">
                        <textarea id="comment" 
                                  name="comment" 
                                  class="form-control"
                                  rows="2"
                                  placeholder="Укажите удобное время доставки, пожелания...">{{ old('comment') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn-submit-order">
                    Подтвердить заказ
                </button>
            </form>
        </div>


        <div class="checkout-summary">
            <h2>Ваш заказ</h2>
            
            <div class="order-items">
                @foreach($cart as $id => $item)
                    <div class="order-item">
                        <div class="order-item-image">
                            @if($item['image'])
                                <img src="{{ asset('images/products/' . basename($item['image'])) }}" 
                                     alt="{{ $item['name'] }}">
                            @else
                                <div class="no-image">🍰</div>
                            @endif
                        </div>
                        <div class="order-item-info">
                            <div class="order-item-name">{{ $item['name'] }}</div>
                            <div class="order-item-price">
                                {{ $item['quantity'] }} x {{ number_format($item['price'], 0, '.', ' ') }} ₽
                            </div>
                            <div class="order-item-subtotal">
                                = {{ number_format($item['price'] * $item['quantity'], 0, '.', ' ') }} ₽
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="order-total">
                <span>Итого:</span>
                <span class="total-price">{{ number_format($total, 0, '.', ' ') }} ₽</span>
            </div>
        </div>
    </div>
</div>

<style>
.checkout-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.checkout-title {
    font-size: 32px;
    color: #4A4A4A;
    margin-bottom: 30px;
    text-align: center;
}

.alert {
    padding: 15px 20px;
    border-radius: 10px;
    margin-bottom: 20px;
}

.alert-danger {
    background: #f8d7da;
    border: 1px solid #f5c6cb;
    color: #721c24;
}

.checkout-content {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 30px;
}

/* Форма */
.checkout-form {
    background: white;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    padding: 30px;
}

.form-section {
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0e4e4;
}

.form-section h2 {
    font-size: 20px;
    color: #4A4A4A;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #4A4A4A;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e8d9d9;
    border-radius: 10px;
    font-size: 15px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: #D4A5A5;
    outline: none;
    box-shadow: 0 0 0 3px rgba(212, 165, 165, 0.1);
}

textarea.form-control {
    resize: vertical;
    min-height: 80px;
}

.is-invalid {
    border-color: #dc2626;
}

.error-message {
    display: block;
    margin-top: 5px;
    color: #dc2626;
    font-size: 13px;
}

/* Способы оплаты */
.payment-methods {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.payment-method {
    display: flex;
    align-items: center;
}

.payment-method input[type="radio"] {
    width: 20px;
    height: 20px;
    margin-right: 10px;
    accent-color: #D4A5A5;
}

.payment-method label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    color: #4A4A4A;
}

.payment-icon {
    font-size: 24px;
}

/* Кнопка отправки */
.btn-submit-order {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #D4A5A5 0%, #c48d8d 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-submit-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(212, 165, 165, 0.4);
}

/* Блок с заказом */
.checkout-summary {
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    padding: 30px;
    height: fit-content;
    position: sticky;
    top: 20px;
}

.checkout-summary h2 {
    font-size: 20px;
    color: #4A4A4A;
    margin-bottom: 20px;
}

.order-items {
    max-height: 400px;
    overflow-y: auto;
    margin-bottom: 20px;
}

.order-item {
    display: grid;
    grid-template-columns: 60px 1fr;
    gap: 15px;
    padding: 15px 0;
    border-bottom: 1px solid #f0e4e4;
}

.order-item:last-child {
    border-bottom: none;
}

.order-item-image {
    width: 60px;
    height: 60px;
    background: #ffe6e6;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.order-item-image img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

.order-item-name {
    font-weight: 600;
    color: #4A4A4A;
    margin-bottom: 5px;
}

.order-item-price {
    color: #666;
    font-size: 13px;
    margin-bottom: 3px;
}

.order-item-subtotal {
    color: #B35C5C;
    font-weight: 600;
    font-size: 14px;
}

.order-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 2px solid #D4A5A5;
    font-size: 20px;
    font-weight: 600;
    color: #4A4A4A;
}

.total-price {
    color: #B35C5C;
}

/* Адаптация */
@media (max-width: 768px) {
    .checkout-content {
        grid-template-columns: 1fr;
    }
    
    .checkout-summary {
        position: static;
    }
}
</style>
@endsection