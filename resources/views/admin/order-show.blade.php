@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', 'Детали заказа')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Заказ #{{ $order->order_number }}</h1>
        <a href="{{ route('admin.orders') }}" class="btn-submit" style="text-decoration: none; background: #6c757d;">← Назад</a>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}">Товары</a>
        <a href="{{ route('admin.orders') }}" class="active">Заказы</a>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 30px;">
        <div class="admin-table" style="padding: 20px;">
            <h3 style="margin-top: 0;">Информация о заказе</h3>
            <p><strong>Номер заказа:</strong> {{ $order->order_number }}</p>
            <p><strong>Дата:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
            <p><strong>Статус:</strong> 
                <span class="status-badge status-{{ $order->status }}">
                    {{ $order->status_name }}
                </span>
            </p>
            <p><strong>Сумма:</strong> {{ number_format($order->total_amount, 0, '.', ' ') }} ₽</p>
            
            <form action="{{ route('admin.order.status', $order->id) }}" method="POST" style="margin-top: 20px;">
                @csrf
                <div style="display: flex; gap: 10px;">
                    <select name="status" class="form-control" style="width: 200px;">
                        <option value="new" {{ $order->status == 'new' ? 'selected' : '' }}>Новый</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>В обработке</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Выполнен</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Отменён</option>
                    </select>
                    <button type="submit" class="btn-submit">Обновить статус</button>
                </div>
            </form>
        </div>

        <div class="admin-table" style="padding: 20px;">
            <h3 style="margin-top: 0;">Информация о клиенте</h3>
            <p><strong>Имя:</strong> {{ $order->customer_name }}</p>
            <p><strong>Телефон:</strong> {{ $order->phone }}</p>
            <p><strong>Адрес:</strong> {{ $order->address }}</p>
            @if($order->comment)
                <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
            @endif
            <p><strong>Способ оплаты:</strong> {{ $order->payment_method_name }}</p>
        </div>
    </div>

    <div class="admin-table">
        <h3 style="padding: 20px; margin: 0;">Состав заказа</h3>
        <table>
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ number_format($item->price, 0, '.', ' ') }} ₽</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->subtotal, 0, '.', ' ') }} ₽</td>
                </tr>
                @endforeach
                <tr style="font-weight: bold; background: #f8f9fa;">
                    <td colspan="3" style="text-align: right;">Итого:</td>
                    <td>{{ number_format($order->total_amount, 0, '.', ' ') }} ₽</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection