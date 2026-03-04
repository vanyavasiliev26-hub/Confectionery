<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header-title') - Кусочек счастья</title>
    
    @vite(['resources/css/app.css'])
</head>
<body>
   <header class="header">
        <div class="logo">
            <div class="brand-name">
                <a href="{{ route('home') }}">🍰 Кусочек счастья</a>
            </div>
        </div>

        <ul class="nav-menu">
            <li><a href="{{ route('catalog') }}">Каталог</a></li>
            <li><a href="{{ route('Sale') }}">Акции</a></li>
            <li><a href="{{ route('about') }}">О нас</a></li>
            <li><a href="{{ route('contact') }}">Контакты</a></li>
        </ul>
        
        <ul class="nav-menu-left">
            <li><a href="{{ route('cart.index') }}">Корзина</a></li>
            @guest
                <li><a href="{{ route('login') }}">Вход</a></li>
            @else     
                <li><a href="{{ route('profile') }}">Профиль</a></li>
            @endguest           
        </ul>
        @auth
    @if(auth()->user()->is_admin)
        <li><a href="{{ route('admin.index') }}" class="admin-link">👑 Админка</a></li>
    @endif
    <li><a href="{{ route('profile') }}">{{ auth()->user()->name }}</a></li>
@endauth
    </header>
    
    <main class="main-content">
        @yield('content')
    </main>
    
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-title">🍰 Кусочек счастья</h3>
                <p class="footer-text">Домашняя кондитерская с любовью к сладкому</p>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-subtitle">Навигация</h4>
                <ul class="footer-links">
                    <li><a href="#">Каталог</a></li>
                    <li><a href="#">Акции</a></li>
                    <li><a href="{{ route('about') }}">О нас</a></li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-subtitle">Контакты</h4>
                <ul class="footer-contact">
                    <li>📞 +7 (999) 123-45-67</li>
                    <li>✉️ info@kusochek.ru</li>
                    <li>📍 г. Москва, ул. Сладкая, д. 1</li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4 class="footer-subtitle">Режим работы</h4>
                <ul class="footer-hours">
                    <li>Пн-Пт: 9:00 - 20:00</li>
                    <li>Сб-Вс: 10:00 - 18:00</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Кусочек счастья. Все права защищены.</p>
        </div>
    </footer>
</body>
</html>