<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(TicketMessage::class);
    }
    protected static function boot()
    {
        parent::boot();
        static::created(function ($ticket) {
            \App\Models\Notification::create([
                'title' => 'تیکت جدید',
                'message' => "تیکت شماره {$ticket->id} توسط {$ticket->user->name} ایجاد شد.",
            ]);
        });
    }


}
