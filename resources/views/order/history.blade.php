@extends('layouts.main')

@section('header-title', 'История заказов')

@section('content')
<div class="history-container">
    <h1 class="history-title">История заказов</h1>

    @if($orders->isEmpty())
        <div class="empty-history">
            <div class="empty-icon">📦</div>
            <h2>У вас пока нет заказов</h2>
            <p>Перейдите в каталог, чтобы выбрать сладости</p>
            <a href="{{ route('catalog') }}" class="btn-catalog">В каталог</a>
        </div>
    @else
        <div class="orders-list">
            @foreach($orders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-number">
                            Заказ #{{ $order->order_number }}
                        </div>
                        <div class="order-date">
                            {{ $order->created_at->format('d.m.Y H:i') }}
                        </div>
                        <div class="order-status status-{{ $order->status }}">
                            {{ $order->status_name }}
                        </div>
                    </div>

                    <div class="order-body">
                        <div class="order-info-grid">
                            <div class="info-item">
                                <span class="info-label">Сумма:</span>
                                <span class="info-value">{{ number_format($order->total_amount, 0, '.', ' ') }} ₽</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Товаров:</span>
                                <span class="info-value">{{ $order->items->count() }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Оплата:</span>
                                <span class="info-value">{{ $order->payment_method_name }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Доставка:</span>
                                <span class="info-value">{{ Str::limit($order->address, 30) }}</span>
                            </div>
                        </div>

                        <div class="order-items-preview">
                            @foreach($order->items->take(3) as $item)
                                <div class="preview-item">
                                    <span class="item-name">{{ $item->product_name }}</span>
                                    <span class="item-quantity">x{{ $item->quantity }}</span>
                                </div>
                            @endforeach
                            @if($order->items->count() > 3)
                                <div class="more-items">
                                    и ещё {{ $order->items->count() - 3 }} товаров
                                </div>
                            @endif
                        </div>

                        <a href="{{ route('order.show', $order->id) }}" class="btn-details">
                            Подробнее →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $orders->links() }}
        </div>
    @endif
</div>

<style>
.history-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
}

.history-title {
    font-size: 32px;
    color: #4A4A4A;
    margin-bottom: 30px;
    text-align: center;
}

/* Пустая история */
.empty-history {
    text-align: center;
    padding: 60px 20px;
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 30px;
}

.empty-icon {
    font-size: 64px;
    margin-bottom: 20px;
}

.empty-history h2 {
    color: #4A4A4A;
    margin-bottom: 10px;
}

.empty-history p {
    color: #666;
    margin-bottom: 25px;
}

.btn-catalog {
    display: inline-block;
    padding: 12px 30px;
    background: #D4A5A5;
    color: white;
    text-decoration: none;
    border-radius: 25px;
    transition: all 0.3s;
}

.btn-catalog:hover {
    background: #c48d8d;
    transform: translateY(-2px);
}

/* Карточка заказа */
.order-card {
    background: white;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    margin-bottom: 20px;
    overflow: hidden;
}

.order-header {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 15px;
    padding: 15px 20px;
    background: #FFF9F0;
    border-bottom: 2px solid #D4A5A5;
}

.order-number {
    font-size: 18px;
    font-weight: 600;
    color: #4A4A4A;
}

.order-date {
    color: #666;
    font-size: 14px;
}

.order-status {
    padding: 5px 12px;
    border-radius: 15px;
    font-size: 13px;
    font-weight: 500;
}

.status-new {
    background: #e3f2fd;
    color: #1976d2;
}

.status-processing {
    background: #fff3e0;
    color: #f57c00;
}

.status-completed {
    background: #e8f5e9;
    color: #388e3c;
}

.status-cancelled {
    background: #ffebee;
    color: #d32f2f;
}

.order-body {
    padding: 20px;
}

.order-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0e4e4;
}

.info-item {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.info-label {
    color: #666;
    font-size: 13px;
}

.info-value {
    color: #4A4A4A;
    font-weight: 600;
}

.order-items-preview {
    margin-bottom: 20px;
}

.preview-item {
    display: flex;
    justify-content: space-between;
    padding: 5px 0;
    color: #666;
}

.item-name {
    font-size: 14px;
}

.item-quantity {
    color: #B35C5C;
    font-weight: 500;
}

.more-items {
    color: #999;
    font-size: 13px;
    font-style: italic;
    margin-top: 5px;
}

.btn-details {
    display: inline-block;
    padding: 8px 20px;
    background: #D4A5A5;
    color: white;
    text-decoration: none;
    border-radius: 20px;
    font-size: 14px;
    transition: all 0.3s;
}

.btn-details:hover {
    background: #c48d8d;
    transform: translateX(5px);
}

.pagination {
    margin-top: 30px;
    display: flex;
    justify-content: center;
}
</style>
@endsection