<?php

// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['affiliate_id', 'amount', 'description'];

    // ارتباط با affiliate
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
