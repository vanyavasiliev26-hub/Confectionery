<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Кто заказал
            $table->string('order_number')->unique(); // Номер заказа (например, ORD-2024-0001)
            $table->string('customer_name'); // Имя получателя
            $table->string('phone'); // Телефон
            $table->text('address'); // Адрес доставки
            $table->string('payment_method'); // Способ оплаты (cash, card, online)
            $table->decimal('total_amount', 10, 2); // Общая сумма
            $table->string('status')->default('new'); // Статус: new, processing, completed, cancelled
            $table->text('comment')->nullable(); // Комментарий к заказу
            $table->timestamps();
            
            // Внешний ключ
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};