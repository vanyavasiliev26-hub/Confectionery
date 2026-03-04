<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'customer_name',
        'phone',
        'address',
        'payment_method',
        'total_amount',
        'status',
        'comment'
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    
    const STATUSES = [
        'new' => 'Новый',
        'processing' => 'В обработке',
        'completed' => 'Выполнен',
        'cancelled' => 'Отменён'
    ];

    
    const PAYMENT_METHODS = [
        'cash' => 'Наличными при получении',
        'card' => 'Картой при получении',
        'online' => 'Онлайн оплата'
    ];

    
    public function getStatusNameAttribute()
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    
    public function getPaymentMethodNameAttribute()
    {
        return self::PAYMENT_METHODS[$this->payment_method] ?? $this->payment_method;
    }
}