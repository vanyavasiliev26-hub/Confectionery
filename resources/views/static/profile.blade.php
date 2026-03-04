@extends('layouts.main')
@vite(['resources/css/profile.css'])

@section('header-title', 'Мой профиль')

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="profile-cover">
            <div class="profile-avatar">
                <span class="avatar-text">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </span>
            </div>
        </div>
        <div class="profile-title">
            <h1>{{ auth()->user()->name }}</h1>
            <p class="profile-email">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <div class="profile-info-card">
        <div class="info-row">
            <span class="info-icon">👤</span>
            <span class="info-label">Имя:</span>
            <span class="info-value">{{ auth()->user()->name }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-icon">📧</span>
            <span class="info-label">Email:</span>
            <span class="info-value">{{ auth()->user()->email }}</span>
        </div>
        
        <div class="info-row">
            <span class="info-icon">📅</span>
            <span class="info-label">На сайте с:</span>
            <span class="info-value">{{ auth()->user()->created_at->format('d.m.Y') }}</span>
        </div>
    </div>


    <div class="profile-actions">
        <a href="{{ route('order.history') }}" class="btn-order-history">
            <span>📦</span> История заказов
        </a>

        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout">
                <span>🚪</span> Выйти
            </button>
        </form>
    </div>
</div>
@endsection