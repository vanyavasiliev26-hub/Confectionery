@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', 'Управление заказами')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Управление заказами</h1>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}">Товары</a>
        <a href="{{ route('admin.orders') }}" class="active">Заказы</a>
        <a href="{{ route('admin.users') }}">Пользователи</a>
    </div>

    <div class="search-box" style="margin-bottom: 20px;">
        <form method="GET" style="display: flex; gap: 10px; width: 100%;">
            <select name="status" class="form-control" style="width: 200px;">
                <option value="">Все статусы</option>
                <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>Новые</option>
                <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>В обработке</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Выполненные</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Отменённые</option>
            </select>
            <input type="text" name="search" placeholder="Поиск по номеру заказа или имени..." value="{{ request('search') }}" style="flex: 1;">
            <button type="submit">Найти</button>
        </form>
    </div>

    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>Клиент</th>
                    <th>Телефон</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ number_format($order->total_amount, 0, '.', ' ') }} ₽</td>
                    <td>
                        <span class="status-badge status-{{ $order->status }}">
                            {{ $order->status_name }}
                        </span>
                    </td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.order.show', $order->id) }}" class="action-btn btn-view">👁️</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $orders->links() }}
    </div>
</div>
@endsection