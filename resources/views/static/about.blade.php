{{-- resources/views/static/about.blade.php --}}
@extends('layouts.main')
@vite(['resources/css/about.css'])

@section('header-title', 'О нас')

@section('content')
<div class="about-container">

    <section class="about-hero">
        <div class="about-hero-content">
            <h1 class="about-hero-title">Кусочек счастья</h1>
            <p class="about-hero-subtitle">Домашняя кондитерская с любовью к сладкому</p>
            <div class="about-hero-decoration">
                <span class="decoration-item">🍰</span>
                <span class="decoration-item">🧁</span>
                <span class="decoration-item">🍪</span>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="about-grid">
            <div class="about-content">
                <h2 class="about-section-title">Наша история</h2>
                <p class="about-text">Всё началось с маленькой кухни и большой мечты — дарить людям радость через домашнюю выпечку. В 2020 году мы решили, что пришло время делиться своим счастьем с миром.</p>
                <p class="about-text">Сегодня "Кусочек счастья" — это уютная кондитерская, где каждый десерт готовится с душой. Мы используем только натуральные ингредиенты, проверенные рецепты и секретный ингредиент — нашу любовь к своему делу.</p>
            </div>
            <div class="about-image">
                <div class="image-placeholder">
                    <span class="placeholder-icon">👩‍🍳</span>
                </div>
            </div>
        </div>
    </section>


    <section class="about-section">
        <h2 class="about-section-title text-center">Наши ценности</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">❤️</div>
                <h3 class="value-title">Сделано с любовью</h3>
                <p class="value-text">Каждое пирожное, каждый тортик мы готовим с особым трепетом, как для самых близких людей.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">🌿</div>
                <h3 class="value-title">Натуральные продукты</h3>
                <p class="value-text">Только свежие яйца, натуральное масло, настоящий шоколад и никаких заменителей.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">📦</div>
                <h3 class="value-title">Свежесть гарантируем</h3>
                <p class="value-text">Готовим в день заказа или под заказ — вы всегда получаете свежую выпечку.</p>
            </div>
            
            <div class="value-card">
                <div class="value-icon">✨</div>
                <h3 class="value-title">Индивидуальный подход</h3>
                <p class="value-text">Учтём все пожелания: от дизайна торта до состава начинки.</p>
            </div>
        </div>
    </section>


    <section class="about-section">
        <h2 class="about-section-title text-center">Наша команда</h2>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-photo">
                    <span class="photo-icon">👩‍🍳</span>
                </div>
                <h3 class="team-name">Анна</h3>
                <p class="team-role">Основатель и шеф-кондитер</p>
                <p class="team-desc">Сладких снов и вкусных дней</p>
            </div>
            
            <div class="team-card">
                <div class="team-photo">
                    <span class="photo-icon">🧑‍🍳</span>
                </div>
                <h3 class="team-name">Елена</h3>
                <p class="team-role">Мастер-декоратор</p>
                <p class="team-desc">Превращает торты в искусство</p>
            </div>
            
            <div class="team-card">
                <div class="team-photo">
                    <span class="photo-icon">👩‍🍳</span>
                </div>
                <h3 class="team-name">Мария</h3>
                <p class="team-role">Технолог</p>
                <p class="team-desc">Отвечает за идеальные рецепты</p>
            </div>
        </div>
    </section>


    <section class="about-section stats-section">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">3+</div>
                <div class="stat-label">года радуем вас</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">500+</div>
                <div class="stat-label">довольных клиентов</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">видов десертов</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">натуральные продукты</div>
            </div>
        </div>
    </section>


    <section class="about-section">
        <h2 class="about-section-title text-center">Что говорят наши гости</h2>
        <div class="reviews-grid">
            <div class="review-card">
                <div class="review-text">Заказывали торт на день рождения дочки — это было волшебно! Очень вкусно и красиво. Спасибо большое!</div>
                <div class="review-author">
                    <span class="author-icon">👤</span>
                    <div class="author-info">
                        <div class="author-name">Екатерина</div>
                        <div class="review-date">февраль 2024</div>
                    </div>
                </div>
            </div>
            
            <div class="review-card">
                <div class="review-text">Постоянно покупаем здесь пирожные к чаю. Очень нежные, вкусные и всегда свежие. Любим вас!</div>
                <div class="review-author">
                    <span class="author-icon">👤</span>
                    <div class="author-info">
                        <div class="author-name">Алексей</div>
                        <div class="review-date">январь 2024</div>
                    </div>
                </div>
            </div>
            
            <div class="review-card">
                <div class="review-text">Заказывали капкейки на корпоратив — все гости были в восторге! Обязательно закажем ещё.</div>
                <div class="review-author">
                    <span class="author-icon">👤</span>
                    <div class="author-info">
                        <div class="author-name">Ольга</div>
                        <div class="review-date">март 2024</div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="about-section cta-section">
        <div class="cta-card">
            <h2 class="cta-title">Хотите попробовать?</h2>
            <p class="cta-text">Загляните в наш каталог и выберите что-то вкусненькое</p>
            <a href="{{ route('catalog') }}" class="cta-button">Перейти в каталог</a>
        </div>
    </section>
</div>
@endsection