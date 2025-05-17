<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            // یافتن یا ایجاد کاربر
            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt('default_password'), // اگر نیاز به رمز عبور باشد
                    'google_id' => $googleUser->getId(),
                ]
            );

            // ورود کاربر
            Auth::login($user);

            return redirect()->route('user.dashboard'); // هدایت به داشبورد یا صفحه دلخواه
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors('خطا در ورود با گوگل');
        }
    }
}
