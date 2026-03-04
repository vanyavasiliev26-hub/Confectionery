@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', 'Админ-панель')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Панель управления</h1>
        <div class="admin-date">{{ now()->format('d.m.Y H:i') }}</div>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}" class="active">Главная</a>
        <a href="{{ route('admin.products') }}">Товары</a>
        <a href="{{ route('admin.orders') }}">Заказы</a>
        <a href="{{ route('admin.users') }}">Пользователи</a>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">📦</div>
            <div class="stat-info">
                <h3>Товаров</h3>
                <div class="stat-number">{{ $productsCount }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">🛒</div>
            <div class="stat-info">
                <h3>Заказов</h3>
                <div class="stat-number">{{ $ordersCount }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">👥</div>
            <div class="stat-info">
                <h3>Пользователей</h3>
                <div class="stat-number">{{ $usersCount }}</div>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">💰</div>
            <div class="stat-info">
                <h3>Выручка</h3>
                <div class="stat-number">{{ number_format($totalRevenue, 0, '.', ' ') }} ₽</div>
            </div>
        </div>
    </div>

    <div class="admin-table">
        <h2 style="padding: 20px; margin: 0;">Последние заказы</h2>
        <table>
            <thead>
                <tr>
                    <th>№ заказа</th>
                    <th>Клиент</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->customer_name }}</td>
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
</div>
@endsection