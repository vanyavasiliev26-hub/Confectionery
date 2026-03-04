@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', 'Управление товарами')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Управление товарами</h1>
        <a href="{{ route('admin.product.create') }}" class="btn-submit" style="text-decoration: none;">+ Добавить товар</a>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}" class="active">Товары</a>
        <a href="{{ route('admin.orders') }}">Заказы</a>
        <a href="{{ route('admin.users') }}">Пользователи</a>
    </div>

    <div class="search-box">
        <form method="GET" style="display: flex; gap: 10px; width: 100%;">
            <input type="text" name="search" placeholder="Поиск по названию..." value="{{ request('search') }}">
            <button type="submit">Найти</button>
        </form>
    </div>

    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>В наличии</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                        @else
                            <span>Нет фото</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ number_format($product->price, 0, '.', ' ') }} ₽</td>
                    <td>{{ $product->stock }} шт.</td>
                    <td>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="action-btn btn-edit">✏️</a>
                        <form action="{{ route('admin.product.delete', $product->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete" onclick="return confirm('Удалить товар?')">🗑️</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
@endsection