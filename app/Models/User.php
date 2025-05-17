<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function isOnline()
    {
        return DB::table('sessions')
            ->where('user_id', $this->id)
            ->where('last_activity', '>=', now()->subMinutes(15)->timestamp)
            ->exists();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','email','password','profile_image','last_login_at','referred_by', 'referral_code','phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function blogs()
    {
      return $this->hasMany('App\Models\Blog', 'author_id');
    }

  // user has many comments
    public function comments()
    {
      return $this->hasMany('App\Models\Comments', 'from_user');
    }
    // افزودن رابطه با سفارشات
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function can_blog()
    {
      $role = $this->role;
      if ($role == 'author' || $role == 'admin') {
        return true;
      }
      return false;
    }
    // تولید کد رفرال یکتا
    public static function generateReferralCode()
    {
        return strtoupper(uniqid('REF'));
    }
    protected static function boot()
{
    parent::boot();

    static::created(function ($user) {
        \App\Models\Notification::create([
            'title' => 'عضویت کاربر جدید',
            'message' => "کاربر {$user->name} با ایمیل {$user->email} ثبت‌نام کرد.",
        ]);
    });
}

}
