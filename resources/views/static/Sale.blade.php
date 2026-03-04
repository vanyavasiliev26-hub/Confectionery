@extends('layouts.main')

@section('header-title', 'Акции')

@section('content')
<div class="promotions-container">
    <div class="promotions-header">
        <h1 class="promotions-title">🍰 Наши акции</h1>
        <p class="promotions-subtitle">Специальные предложения и скидки для вас</p>
    </div>

    <div class="empty-promotions">
        <div class="empty-icon">🎉</div>
        <h2 class="empty-title">Пока что акций нет</h2>
        <p class="empty-text">Но мы постоянно работаем над новыми предложениями!<br>Загляните чуть позже, чтобы не пропустить выгодные акции.</p>
        
        <div class="empty-actions">
            <a href="{{ route('catalog') }}" class="btn-catalog">
                <span>🍰 Перейти в каталог</span>
            </a>
            <a href="{{ route('home') }}" class="btn-home">
                <span>🏠 На главную</span>
            </a>
        </div>
    </div>
</div>

<style>
.promotions-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
    min-height: 60vh;
}

.promotions-header {
    text-align: center;
    margin-bottom: 50px;
}

.promotions-title {
    font-size: 48px;
    color: #4A4A4A;
    margin-bottom: 10px;
    font-weight: 600;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.05);
}

.promotions-subtitle {
    font-size: 18px;
    color: #666;
    line-height: 1.6;
}

/* Стили для пустой страницы */
.empty-promotions {
    background: #FFF9F0;
    border: 2px solid #D4A5A5;
    border-radius: 40px;
    padding: 60px 30px;
    text-align: center;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 10px 30px rgba(212, 165, 165, 0.15);
}

.empty-icon {
    font-size: 80px;
    margin-bottom: 20px;
    animation: bounce 2s infinite;
}

.empty-title {
    font-size: 32px;
    color: #4A4A4A;
    margin-bottom: 15px;
    font-weight: 600;
}

.empty-text {
    font-size: 18px;
    color: #666;
    line-height: 1.8;
    margin-bottom: 35px;
}

.empty-actions {
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-catalog, .btn-home {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 15px 35px;
    border-radius: 50px;
    font-size: 18px;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-catalog {
    background: linear-gradient(135deg, #D4A5A5 0%, #c48d8d 100%);
    color: white;
    box-shadow: 0 4px 15px rgba(212, 165, 165, 0.3);
}

.btn-catalog:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(212, 165, 165, 0.4);
}

.btn-home {
    background: white;
    color: #4A4A4A;
    border: 2px solid #D4A5A5;
}

.btn-home:hover {
    background: #FFF9F0;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(212, 165, 165, 0.2);
}

/* Анимация */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Стили для будущих акций (когда появятся) */
.promotions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

.promotion-card {
    background: white;
    border: 2px solid #D4A5A5;
    border-radius: 20px;
    overflow: hidden;
    transition: transform 0.3s ease;
    position: relative;
}

.promotion-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(212, 165, 165, 0.3);
}

.promotion-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #B35C5C;
    color: white;
    padding: 8px 15px;
    border-radius: 25px;
    font-weight: 600;
    font-size: 16px;
    z-index: 1;
}

.promotion-image {
    height: 200px;
    overflow: hidden;
}

.promotion-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.promotion-card:hover .promotion-image img {
    transform: scale(1.05);
}

.promotion-info {
    padding: 20px;
}

.promotion-info h3 {
    margin: 0 0 8px 0;
    font-size: 20px;
    color: #4A4A4A;
}

.promotion-info p {
    margin: 0 0 12px 0;
    color: #666;
    font-size: 15px;
    line-height: 1.5;
}

.promotion-date {
    color: #B35C5C;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 5px;
}

.promotion-date::before {
    content: '📅';
    font-size: 16px;
}

/* Адаптивность */
@media (max-width: 768px) {
    .promotions-title {
        font-size: 36px;
    }
    
    .promotions-subtitle {
        font-size: 16px;
    }
    
    .empty-title {
        font-size: 24px;
    }
    
    .empty-text {
        font-size: 16px;
    }
    
    .empty-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-catalog, .btn-home {
        width: 100%;
        justify-content: center;
        padding: 12px 25px;
        font-size: 16px;
    }
}

@media (max-width: 480px) {
    .promotions-title {
        font-size: 28px;
    }
    
    .empty-icon {
        font-size: 60px;
    }
    
    .empty-title {
        font-size: 22px;
    }
    
    .empty-promotions {
        padding: 40px 20px;
    }
}
</style>
@endsection