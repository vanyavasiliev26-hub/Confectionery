@extends('layouts.main')
@vite(['resources/css/admin.css'])

@section('header-title', 'Управление пользователями')

@section('content')
<div class="admin-container">
    <div class="admin-header">
        <h1>Управление пользователями</h1>
    </div>

    <div class="admin-nav">
        <a href="{{ route('admin.index') }}">Главная</a>
        <a href="{{ route('admin.products') }}">Товары</a>
        <a href="{{ route('admin.orders') }}">Заказы</a>
        <a href="{{ route('admin.users') }}" class="active">Пользователи</a>
    </div>

    <div class="search-box">
        <form method="GET" style="display: flex; gap: 10px; width: 100%;">
            <input type="text" name="search" placeholder="Поиск по имени или email..." value="{{ request('search') }}">
            <button type="submit">Найти</button>
        </form>
    </div>

    <div class="admin-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Администратор</th>
                    <th>Дата регистрации</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="status-badge status-completed">Да</span>
                        @else
                            <span class="status-badge status-new">Нет</span>
                        @endif
                    </td>
                    <td>{{ $user->created_at->format('d.m.Y') }}</td>
                    <td>

                        <form action="{{ route('admin.user.toggle-admin', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @if($user->is_admin)
                                <button type="submit" class="action-btn btn-delete" onclick="return confirm('Снять права администратора?')">
                                    👑 Снять
                                </button>
                            @else
                                <button type="submit" class="action-btn btn-edit" onclick="return confirm('Назначить администратором?')">
                                    👑 Назначить
                                </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $users->links() }}
    </div>
</div>
@endsection