@extends('layouts.main')

@section('header-title', 'Главная')

@section('content')
<div class="hero-section">

    <div class="hero-image">
        
        <div class="hero-content">
            <h1 class="hero-title">🍰 Кусочек счастья</h1>
            <p class="hero-subtitle">Домашняя кондитерская с любовью к сладкому</p>
            <p class="hero-text">
                У нас вы найдёте самые вкусные торты, пирожные и десерты, 
                приготовленные по домашним рецептам из натуральных продуктов.
                Каждое изделие мы создаём с душой, чтобы ваш день стал слаще!
            </p>
            <a href="{{ route('catalog') }}" class="hero-button">
                <span>Перейти в каталог</span>
                <span class="button-icon">→</span>
            </a>
        </div>
    </div>
</div>


<div class="features-section">
    <h2 class="features-title">Почему выбирают нас</h2>
    
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🍰</div>
            <h3 class="feature-title">Домашние рецепты</h3>
            <p class="feature-text">Готовим по традиционным семейным рецептам, которые передаются из поколения в поколение</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">🥚</div>
            <h3 class="feature-title">Натуральные продукты</h3>
            <p class="feature-text">Используем только свежие и качественные ингредиенты без консервантов</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">🎂</div>
            <h3 class="feature-title">На заказ</h3>
            <p class="feature-text">Приготовим любой торт по вашему желанию для праздника или особого случая</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">🚚</div>
            <h3 class="feature-title">Доставка</h3>
            <p class="feature-text">Бесплатная доставка по городу при заказе от 1000 рублей</p>
        </div>
    </div>
</div>

<style>
.hero-section {
    width: 100%;
    margin: -20px 0 30px 0;
    position: relative;
}

.hero-image {
    height: 600px;
    background-image: url('https://images.unsplash.com/photo-1464349095431-e921b89cb48b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1936&q=80');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0.3) 100%);
}

.hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    color: black; /* ИЗМЕНЕНО: было white, стало black */
    max-width: 800px;
    padding: 0 20px;
}

.hero-title {
    font-size: 64px;
    font-weight: 700;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5); /* ИЗМЕНЕНО: белая тень для контраста */
    animation: fadeInDown 1s ease;
}

.hero-subtitle {
    font-size: 28px;
    margin-bottom: 25px;
    font-weight: 400;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5); /* ИЗМЕНЕНО: белая тень */
    animation: fadeInUp 1s ease 0.2s both;
}

.hero-text {
    font-size: 18px;
    line-height: 1.8;
    margin-bottom: 35px;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5); /* ИЗМЕНЕНО: белая тень */
    animation: fadeInUp 1s ease 0.4s both;
}

.hero-button {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 18px 45px;
    background: linear-gradient(135deg, #D4A5A5 0%, #c48d8d 100%);
    color: white;
    text-decoration: none;
    border-radius: 50px;
    font-size: 20px;
    font-weight: 600;
    transition: all 0.3s ease;
    animation: fadeInUp 1s ease 0.6s both;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.hero-button:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
}

.button-icon {
    font-size: 24px;
    transition: transform 0.3s;
}

.hero-button:hover .button-icon {
    transform: translateX(5px);
}

/* Секция с преимуществами */
.features-section {
    max-width: 1200px;
    margin: 60px auto;
    padding: 0 20px;
}

.features-title {
    text-align: center;
    font-size: 36px;
    color: #4A4A4A;
    margin-bottom: 50px;
    position: relative;
}

.features-title::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: linear-gradient(to right, #D4A5A5, #B35C5C);
    border-radius: 2px;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
}

.feature-card {
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    padding: 30px 20px;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(212, 165, 165, 0.3);
}

.feature-icon {
    font-size: 48px;
    margin-bottom: 20px;
    display: inline-block;
    background: white;
    width: 80px;
    height: 80px;
    line-height: 80px;
    border-radius: 50%;
    border: 2px solid #D4A5A5;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon {
    transform: scale(1.1);
    background: #D4A5A5;
    color: white;
}

.feature-title {
    font-size: 20px;
    color: #4A4A4A;
    margin-bottom: 15px;
    font-weight: 600;
}

.feature-text {
    font-size: 14px;
    color: #666;
    line-height: 1.6;
}

/* Анимации */
@keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Адаптация для планшетов */
@media (max-width: 900px) {
    .hero-image {
        height: 500px;
    }
    
    .hero-title {
        font-size: 48px;
    }
    
    .hero-subtitle {
        font-size: 22px;
    }
    
    .hero-text {
        font-size: 16px;
    }
    
    .features-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Адаптация для мобильных */
@media (max-width: 600px) {
    .hero-image {
        height: 400px;
    }
    
    .hero-title {
        font-size: 36px;
    }
    
    .hero-subtitle {
        font-size: 18px;
    }
    
    .hero-text {
        font-size: 14px;
        line-height: 1.6;
    }
    
    .hero-button {
        padding: 12px 30px;
        font-size: 16px;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .feature-card {
        padding: 20px;
    }
}

/* Маленькие экраны */
@media (max-width: 380px) {
    .hero-title {
        font-size: 28px;
    }
}
</style>
@endsection