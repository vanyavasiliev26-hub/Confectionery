@extends('layouts.main')

@section('header-title', 'Заказ оформлен')

@section('content')
<div class="success-container">
    <div class="success-card">
        <div class="success-icon">✅</div>
        <h1>Спасибо за заказ!</h1>
        <p class="success-message">Ваш заказ успешно оформлен</p>
        
        <div class="order-info">
            <p><strong>Номер заказа:</strong> {{ $order->order_number }}</p>
            <p><strong>Сумма:</strong> {{ number_format($order->total_amount, 0, '.', ' ') }} ₽</p>
            <p><strong>Статус:</strong> {{ $order->status_name }}</p>
        </div>

        <p class="info-text">
            Мы свяжемся с вами в ближайшее время для подтверждения заказа.
        </p>

        <div class="success-actions">
            <a href="{{ route('order.history') }}" class="btn-history">История заказов</a>
            <a href="{{ route('catalog') }}" class="btn-catalog">В каталог</a>
        </div>
    </div>
</div>

<style>
.success-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 60vh;
    padding: 20px;
}

.success-card {
    max-width: 500px;
    width: 100%;
    background: white;
    border: 2px solid #D4A5A5;
    border-radius: 30px;
    padding: 40px;
    text-align: center;
}

.success-icon {
    font-size: 64px;
    margin-bottom: 20px;
}

.success-card h1 {
    color: #4A4A4A;
    margin-bottom: 10px;
}

.success-message {
    color: #666;
    margin-bottom: 30px;
}

.order-info {
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 20px;
    text-align: left;
}

.order-info p {
    margin: 10px 0;
    color: #4A4A4A;
}

.info-text {
    color: #666;
    margin-bottom: 30px;
}

.success-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.btn-history, .btn-catalog {
    padding: 12px 25px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-history {
    background: #D4A5A5;
    color: white;
}

.btn-history:hover {
    background: #c48d8d;
    transform: translateY(-2px);
}

.btn-catalog {
    background: #f0f0f0;
    color: #4A4A4A;
}

.btn-catalog:hover {
    background: #e0e0e0;
    transform: translateY(-2px);
}
</style>
@endsection