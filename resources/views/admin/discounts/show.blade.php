@extends('admin.layout')

@section('content')
<h1>Discount Details</h1>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Code: {{ $discount->code }}</h5>
        <p class="card-text">
            <strong>Type:</strong> {{ $discount->percentage ? 'Percentage' : 'Fixed Amount' }}<br>
            <strong>Value:</strong> {{ $discount->percentage ? $discount->percentage . '%' : '$' . $discount->fixed_amount }}<br>
            <strong>Usage Limit:</strong> {{ $discount->usage_limit ?? 'Unlimited' }}<br>
            <strong>Expires At:</strong> {{ $discount->expires_at ? $discount->expires_at->format('Y-m-d H:i') : 'No Expiry' }}<br>
            <strong>Status:</strong>
            @if($discount->isExpired())
                <span class="text-danger">Expired</span>
            @elseif($discount->isAvailable())
                <span class="text-success">Active</span>
            @else
                <span class="text-warning">Unavailable</span>
            @endif
        </p>
        <a href="{{ route('admin.discounts.edit', $discount->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('admin.discounts.destroy', $discount->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
