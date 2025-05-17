<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{

    protected $fillable = ['code', 'amount', 'percentage', 'expires_at', 'usage_limit', 'times_used'];


    public function isValid()
    {
        return $this->expires_at > now() &&
               ($this->usage_limit === null || $this->times_used < $this->usage_limit);
    }
}
