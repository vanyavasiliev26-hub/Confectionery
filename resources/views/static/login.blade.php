@extends('layouts.main')

@section('header-title', 'Вход')

@section('content')
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h2>Добро пожаловать! 🍰</h2>
            <p>Войдите в свой аккаунт</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-wrapper">
                    <span class="input-icon">📧</span>
                    <input type="email" id="email" name="email" class="form-control" 
                           placeholder="your@email.com" value="{{ old('email') }}" required autofocus>
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
                           placeholder="Введите пароль" required>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>


            <div class="password-options">
                <label class="checkbox-label">
                    <input type="checkbox" name="show_password" id="showPassword">
                    <span>👁️ Показать пароль</span>
                </label>
                
                <a href="#" class="forgot-password">Забыли пароль?</a>
            </div>


            <button type="submit" class="btn-auth">
                <span>Войти</span>
                <span class="btn-icon">→</span>
            </button>


            <div class="auth-divider">
                <span class="divider-text">или войдите через</span>
            </div>


            <div class="social-login">
                <button type="button" class="social-btn google">
                    <span class="social-icon">G</span>
                    <span>Google</span>
                </button>
                
                <button type="button" class="social-btn vk">
                    <span class="social-icon">VK</span>
                    <span>VK</span>
                </button>
                
                <button type="button" class="social-btn yandex">
                    <span class="social-icon">Я</span>
                    <span>Яндекс</span>
                </button>
            </div>

        </form>

        <div class="auth-footer">
            <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
        </div>
    </div>
</div>



@endsection