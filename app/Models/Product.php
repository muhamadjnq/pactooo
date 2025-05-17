<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','title', 'price', 'type', 'link', 'slug', 'image', 'description', 'is_active'];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_product');
    }

    // تنظیم اسلاگ به صورت خودکار
    public static function boot()
    {

        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->title);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->title);
        });
    }
    // محاسبه قیمت نهایی بر اساس نوع محصول
    public function calculatePrice($quantity = 1)
    {
        switch ($this->type) {
            case 'view_based':
                return $quantity * $this->price; // قیمت متغیر بر اساس تعداد
            case 'fixed':
                return $this->price; // قیمت ثابت
            case 'package':
                return $this->price; // قیمت پکیج (فرض بر این که تعداد معنی ندارد)
            case 'campaign':
                return $this->price;
            default:
                throw new \Exception("نوع محصول ناشناخته است.");
        }
    }

    // بررسی متغیر بودن محصول
    public function isVariable()
    {
        return $this->type === 'view_based';
    }
}
