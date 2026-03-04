@extends('layouts.main')

@section('header-title', 'Регистрация')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Создать аккаунт</h2>
            <p>Присоединяйтесь к нам</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="name">Имя</label>
                <div class="input-wrapper">
                    <span class="input-icon">👤</span>
                    <input type="text" id="name" name="name" class="form-control" 
                           placeholder="Ваше имя" value="{{ old('name') }}" required autofocus>
                </div>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" id="email" name="email" class="form-control" 
                           placeholder="your@email.com" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔒</span>
                    <input type="password" id="password" name="password" class="form-control" 
                           placeholder="Минимум 8 символов" required>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля</label>
                <div class="input-wrapper">
                    <span class="input-icon">🔐</span>
                    <input type="password" id="password_confirmation" name="password_confirmation" 
                           class="form-control" placeholder="Повторите пароль" required>
                </div>
            </div>


            <button type="submit" class="btn-auth">
                <span>Зарегистрироваться</span>
                <span class="btn-icon">→</span>
            </button>
        </form>

        <div class="auth-footer">
            <p>Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
        </div>
    </div>
</div>
@endsection