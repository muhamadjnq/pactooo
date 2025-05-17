<?php

namespace App\Http\Controllers;

use App\Models\AdOrder;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdOrderController extends Controller
{
    public function create($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return view('orders.create', compact('service'));
    }

    public function store(Request $request, $serviceId)
    {
        $request->validate(['details' => 'required|string']);

        AdOrder::create([
            'user_id' => Auth::id(),
            'service_id' => $serviceId,
            'details' => $request->details,
            'status' => 'pending',
        ]);

        return redirect()->route('user.orders.index')->with('success', 'سفارش شما ثبت شد!');
    }

    public function index()
    {
        $orders = AdOrder::where('user_id', Auth::id())->with('service')->get();
        return view('orders.index', compact('orders'));
    }
}
