<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Добавляем количество товара (целое число, по умолчанию 0)
            $table->integer('stock')->default(0)->after('image');
            
            // Добавляем категорию (строка, можно оставить пустой)
            $table->string('category')->nullable()->after('stock');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Удаляем добавленные поля при откате
            $table->dropColumn(['stock', 'category']);
        });
    }
};