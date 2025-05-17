<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::all();
        return view('admin.discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discounts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:discounts',
            'percentage' => 'nullable|integer|min:1|max:100',
            'amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'expires_at' => 'nullable|date',
        ]);

        Discount::create($validated);

        return redirect()->route('admin.discounts.index')->with('success', 'Discount created successfully!');
    }

    public function show(Discount $discount)
    {
        return view('admin.discounts.show', compact('discount'));
    }

    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit', compact('discount'));
    }

    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:discounts,code,' . $discount->id,
            'percentage' => 'nullable|integer|min:1|max:100',
            'amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:0',
            'expires_at' => 'nullable|date',
        ]);

        $discount->update($validated);

        return redirect()->route('admin.discounts.index')->with('success', 'Discount updated successfully!');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('admin.discounts.index')->with('success', 'Discount deleted successfully!');
    }
}
