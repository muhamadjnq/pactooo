<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Affiliate;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class Payment extends Model
{
    use HasFactory;

    /**
     * مشخص کردن فیلدهایی که می‌توانند پر شوند
     */
    protected $fillable = [
        'user_id',
        'order_id',
        'campaign_id', // اضافه کردن این فیلد
        'amount',
        'status',
        'transaction_id',
        'gateway',
        'details',
    ];

    /**
     * ارتباط با مدل کاربر
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    protected static function booted()
    {
        static::updated(function ($payment) {
            if ($payment->status === 'success') {
                $order = $payment->order;
                if ($order && $order->user_id) {
                    $affiliate = Affiliate::where('user_id', $order->user_id)->first();
                    if ($affiliate) {
                        $discountedAmount = $payment->amount * 0.8;
                        $commission = $discountedAmount * 0.1;
                        $referred_by = $affiliate->user->referred_by;
                        Affiliate::where('user_id', $referred_by)->increment('total_commission', $commission);
                        $order->update(['commission' => $commission]);
                    }
                }
            }
        });
    }
}
