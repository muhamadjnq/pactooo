<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Product;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->paginate(10);
        return view('admin.campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.campaigns.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'required|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'content_link' => 'nullable|url',
            'goal' => 'nullable|string',
            'message' => 'nullable|string',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $campaign = Campaign::create($request->only([
            'name', 'description', 'budget', 'start_date', 'end_date',
            'content_link', 'goal', 'message'
        ]));

        $campaign->products()->sync($request->products);

        return redirect()->route('admin.campaigns.index')->with('success', 'کمپین با موفقیت ایجاد شد.');
    }

    public function edit(Campaign $campaign)
    {
        $products = Product::all();
        $campaign->load('products');
        return view('admin.campaigns.edit', compact('campaign', 'products'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'required|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'content_link' => 'nullable|url',
            'goal' => 'nullable|string',
            'message' => 'nullable|string',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $campaign->update($request->only([
            'name', 'description', 'budget', 'start_date', 'end_date',
            'content_link', 'goal', 'message'
        ]));

        $campaign->products()->sync($request->products);

        return redirect()->route('admin.campaigns.index')->with('success', 'کمپین با موفقیت ویرایش شد.');
    }
    public function show($id)
    {
        // پیدا کردن کمپین مورد نظر
        $campaign = Campaign::with('products')->findOrFail($id);
        // بازگرداندن ویو نمایش جزئیات کمپین
        return view('admin.campaigns.show', compact('campaign'));
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return redirect()->route('admin.campaigns.index')->with('success', 'کمپین با موفقیت حذف شد.');
    }
}
