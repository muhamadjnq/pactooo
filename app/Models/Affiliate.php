<?php

// app/Models/Affiliate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'referral_code', 'clicks', 'orders', 'total_commission'];

    // متد برای تولید کد معرف یکتا
    public static function generateReferralCode($userId)
    {
        return 'AFF-' . strtoupper(Str::random(6)) . '-' . $userId;
    }

    // ارتباط با تراکنش‌ها
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // ارتباط با کاربر
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
