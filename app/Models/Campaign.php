<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'budget', 'start_date', 'end_date', 'content_link',
        'goal', 'message', 'status', 'is_paid',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'campaign_product');
    }
}
