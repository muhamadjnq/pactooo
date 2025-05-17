<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'user_id', 'message'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
