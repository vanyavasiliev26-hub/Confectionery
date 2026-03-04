@extends('layouts.main')
@vite(['resources/css/contact.css'])

@section('header-title')
Страница контактов
@endsection

@section('content')
<main class="contacts-page">
    <div class="contacts-container">
        <div class="contact-info-side">
            <h2>Контактная информация</h2>
            
            <div class="info-list">
                <div class="info-item">
                    <span class="info-icon">📞</span>
                    <div>
                        <div class="info-label">Телефон</div>
                        <div class="info-value">+7 (999) 123-45-67</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <span class="info-icon">✉️</span>
                    <div>
                        <div class="info-label">Email</div>
                        <div class="info-value">info@kusochek.ru</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <span class="info-icon">📍</span>
                    <div>
                        <div class="info-label">Адрес</div>
                        <div class="info-value">г. Москва, ул. Сладкая, д. 1</div>
                    </div>
                </div>
                
                <div class="info-item">
                    <span class="info-icon">🕒</span>
                    <div>
                        <div class="info-label">Режим работы</div>
                        <div class="info-value">Пн-Пт: 9:00 - 20:00</div>
                        <div class="info-value">Сб-Вс: 10:00 - 18:00</div>
                    </div>
                </div>
            </div>
            
            <div class="social-links">
                <h3>Мы в соцсетях</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📱</a>
                    <a href="#" class="social-icon">💬</a>
                </div>
            </div>
        </div>

        <div class="form-side">
            <h1>Напишите нам</h1>
            
            @if($errors->any())
                <div class="block-error">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            
            <form action="{{ route('contact.post') }}" method="POST" class="contact-form">
                @csrf

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" placeholder="Введите имя" name="name" id="name" value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Введите email" name="email" id="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label for="subject">Тема сообщения</label>
                    <input type="text" placeholder="Введите тему" name="subject" id="subject" value="{{ old('subject') }}">
                </div>

                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea name="message" id="message" placeholder="Введите сообщение">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="submit-btn">Отправить сообщение</button>
            </form>
        </div>
    </div>
</main>
@endsection