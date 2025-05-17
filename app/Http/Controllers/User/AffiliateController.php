<?php

namespace App\Http\Controllers\User;

use App\Models\Affiliate;
use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{
    // داشبورد همکاری در فروش
    public function dashboard(Request $request)
    {
      $affiliate = Affiliate::firstOrCreate(
      ['user_id' => $request->user()->id],
      ['referral_code' => Affiliate::generateReferralCode($request->user()->id)]
  );
      $categories = Category::with('products')->get();
        return view('user.affiliate.dashboard', [
            'affiliate' => $affiliate,
            'categories' => $categories
        ]);
    }

    // صفحه لینک معرف
    public function referral(Request $request)
    {
      $categories = Category::with('products')->get();
        $affiliate = Affiliate::firstOrCreate(
            ['user_id' => $request->user()->id],
            ['referral_code' => Affiliate::generateReferralCode($request->user()->id)]
        );

        return view('user.affiliate.referral', [
            'referral_link' => url('/register?ref=' . $affiliate->referral_code),
            'categories' => $categories
        ]);
      }

    // تراکنش‌ها
    public function transactions(Request $request)
    {
        $categories = Category::with('products')->get();
        $affiliate = Affiliate::where('user_id', $request->user()->id)->first();
        $transactions = $affiliate ? $affiliate->transactions()->latest()->paginate(10) : collect([]);

        return view('user.affiliate.transactions', [
            'transactions' => $transactions,
            'categories' => $categories,
        ]);
    }
}
