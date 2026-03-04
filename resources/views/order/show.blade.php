@extends('layouts.main')

@section('header-title', 'Заказ #' . $order->order_number)

@section('content')
<div class="order-detail-container">
    <div class="order-header">
        <h1>Заказ #{{ $order->order_number }}</h1>
        <div class="order-status-large status-{{ $order->status }}">
            {{ $order->status_name }}
        </div>
    </div>

    <div class="order-detail-grid">

        <div class="detail-card">
            <h2>Информация о заказе</h2>
            
            <div class="detail-row">
                <span class="detail-label">Дата заказа:</span>
                <span class="detail-value">{{ $order->created_at->format('d.m.Y H:i') }}</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Сумма заказа:</span>
                <span class="detail-value price">{{ number_format($order->total_amount, 0, '.', ' ') }} ₽</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Способ оплаты:</span>
                <span class="detail-value">{{ $order->payment_method_name }}</span>
            </div>
            
            @if($order->comment)
                <div class="detail-row">
                    <span class="detail-label">Комментарий:</span>
                    <span class="detail-value">{{ $order->comment }}</span>
                </div>
            @endif
        </div>


        <div class="detail-card">
            <h2>Доставка</h2>
            
            <div class="detail-row">
                <span class="detail-label">Получатель:</span>
                <span class="detail-value">{{ $order->customer_name }}</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Телефон:</span>
                <span class="detail-value">{{ $order->phone }}</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Адрес:</span>
                <span class="detail-value">{{ $order->address }}</span>
            </div>
        </div>

        <div class="detail-card full-width">
            <h2>Состав заказа</h2>
            
            <div class="order-items-list">
                @foreach($order->items as $item)
                    <div class="order-item-detail">
                        <div class="item-info">
                            <span class="item-name">{{ $item->product_name }}</span>
                            <span class="item-price">{{ number_format($item->price, 0, '.', ' ') }} ₽</span>
                        </div>
                        <div class="item-quantity">
                            x{{ $item->quantity }}
                        </div>
                        <div class="item-subtotal">
                            {{ number_format($item->subtotal, 0, '.', ' ') }} ₽
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="order-total-large">
                <span>Итого:</span>
                <span>{{ number_format($order->total_amount, 0, '.', ' ') }} ₽</span>
            </div>
        </div>
    </div>

    <div class="order-actions">
        <a href="{{ route('order.history') }}" class="btn-back">← К списку заказов</a>
        <a href="{{ route('catalog') }}" class="btn-catalog">В каталог</a>
    </div>
</div>

<style>
.order-detail-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.order-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding: 20px;
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
}

.order-header h1 {
    color: #4A4A4A;
    font-size: 24px;
    margin: 0;
}

.order-status-large {
    padding: 8px 20px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
}

.order-detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}

.detail-card {
    background: white;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    padding: 25px;
}

.detail-card.full-width {
    grid-column: 1 / -1;
}

.detail-card h2 {
    color: #4A4A4A;
    font-size: 18px;
    margin: 0 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 2px solid #f0e4e4;
}

.detail-row {
    display: flex;
    margin-bottom: 12px;
}

.detail-label {
    width: 120px;
    color: #666;
    font-size: 14px;
}

.detail-value {
    flex: 1;
    color: #4A4A4A;
    font-weight: 500;
}

.detail-value.price {
    color: #B35C5C;
    font-weight: 600;
}

.order-items-list {
    margin-bottom: 20px;
}

.order-item-detail {
    display: grid;
    grid-template-columns: 1fr 80px 100px;
    gap: 10px;
    padding: 10px 0;
    border-bottom: 1px solid #f0e4e4;
}

.order-item-detail:last-child {
    border-bottom: none;
}

.item-info {
    display: flex;
    flex-direction: column;
}

.item-name {
    color: #4A4A4A;
    font-weight: 500;
    margin-bottom: 3px;
}

.item-price {
    color: #666;
    font-size: 13px;
}

.item-quantity {
    color: #B35C5C;
    font-weight: 600;
    text-align: center;
}

.item-subtotal {
    text-align: right;
    font-weight: 600;
    color: #4A4A4A;
}

.order-total-large {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 20px;
    border-top: 2px solid #D4A5A5;
    font-size: 20px;
    font-weight: 600;
    color: #4A4A4A;
}

.order-total-large span:last-child {
    color: #B35C5C;
}

.order-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
}

.btn-back, .btn-catalog {
    padding: 12px 30px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-back {
    background: #f0f0f0;
    color: #4A4A4A;
}

.btn-back:hover {
    background: #e0e0e0;
    transform: translateX(-5px);
}

.btn-catalog {
    background: #D4A5A5;
    color: white;
}

.btn-catalog:hover {
    background: #c48d8d;
    transform: translateX(5px);
}
</style>
@endsection