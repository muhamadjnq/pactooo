<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_price', 'commission', 'status', 'discount_id', 'final_price'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function calculateFinalPrice()
    {
        if ($this->discount) {
            if ($this->discount->amount) {
                return max(0, $this->total_price - $this->discount->amount);
            }
            if ($this->discount->percentage) {
                return max(0, $this->total_price * (1 - $this->discount->percentage / 100));
            }
        }
        return $this->total_price;
    }
    protected static function boot()
{
    parent::boot();

    static::updated(function ($order) {
        if ($order->status === 'paid') {
            \App\Models\Notification::create([
                'title' => 'پرداخت سفارش',
                'message' => "سفارش شماره {$order->id} پرداخت شد.",
            ]);
        }
    });
}

}
