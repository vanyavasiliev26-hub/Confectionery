@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', isset($product) ? 'Редактировать товар' : 'Добавить товар')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>{{ isset($product) ? 'Редактировать товар' : 'Добавить товар' }}</h1>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}" class="active">Товары</a>
        <a href="{{ route('admin.orders') }}">Заказы</a>
        <a href="{{ route('admin.users') }}">Пользователи</a>
    </div>

    <form class="admin-form" method="POST" action="{{ isset($product) ? route('admin.product.update', $product->id) : route('admin.product.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Название товара</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="category">Категория</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">Выберите категорию</option>
                <option value="Торты" {{ (old('category', $product->category ?? '') == 'Торты') ? 'selected' : '' }}>Торты</option>
                <option value="Пирожные" {{ (old('category', $product->category ?? '') == 'Пирожные') ? 'selected' : '' }}>Пирожные</option>
                <option value="Капкейки" {{ (old('category', $product->category ?? '') == 'Капкейки') ? 'selected' : '' }}>Капкейки</option>
                <option value="Печенье" {{ (old('category', $product->category ?? '') == 'Печенье') ? 'selected' : '' }}>Печенье</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $product->description ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Цена (₽)</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $product->price ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="stock">Количество на складе</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @if(isset($product) && $product->image)
                <div style="margin-top: 10px;">
                    <img src="{{ asset('images/' . $product->image) }}" alt="" style="max-width: 200px; border-radius: 5px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn-submit">
            {{ isset($product) ? 'Обновить' : 'Создать' }}
        </button>
    </form>
</div>
@endsection