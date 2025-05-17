<?php
// ProfileController.php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $categories = Category::with('products')->get();
        $user = Auth::user();
        return view('user.profile.edit', compact('categories','user'));
    }

    public function update(Request $request)
    {
        $categories = Category::with('products')->get();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // محدودیت حجم و نوع فایل
        ]);

        $user = auth()->user();
        if ($request->hasFile('profile_image')) {
            // حذف تصویر قبلی اگر وجود دارد
            if ($user->profile_image) {
                Storage::delete('public/profile_images/' . $user->profile_image);
            }

            // ذخیره تصویر جدید
            $fileName = time() . '_' . $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/profile_images', $fileName);

            $user->profile_image = $fileName;
        }
        $user->save();


        return redirect()->route('user.profile')->with('success', 'پروفایل شما به روز رسانی شد');
    }
}
