@extends('admin.layout')

@section('content')
<h1>Edit Discount</h1>
<form action="{{ route('admin.discounts.update', $discount->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="code">Discount Code</label>
        <input type="text" name="code" id="code" class="form-control" value="{{ old('code', $discount->code) }}" required>
    </div>

    <div class="form-group">
        <label for="percentage">Percentage Discount (%)</label>
        <input type="number" name="percentage" id="percentage" class="form-control" value="{{ old('percentage', $discount->percentage) }}" min="1" max="100">
    </div>

    <div class="form-group">
        <label for="fixed_amount">Fixed Amount Discount</label>
        <input type="number" name="fixed_amount" id="fixed_amount" class="form-control" value="{{ old('fixed_amount', $discount->fixed_amount) }}" step="0.01">
    </div>

    <div class="form-group">
        <label for="usage_limit">Usage Limit</label>
        <input type="number" name="usage_limit" id="usage_limit" class="form-control" value="{{ old('usage_limit', $discount->usage_limit) }}" min="1">
    </div>

    <div class="form-group">
        <label for="expires_at">Expiration Date</label>
        <input type="datetime-local" name="expires_at" id="expires_at" class="form-control" value="{{ old('expires_at', $discount->expires_at ? $discount->expires_at->format('Y-m-d\TH:i') : null) }}">
    </div>

    <button type="submit" class="btn btn-success">Update Discount</button>
</form>
@endsection
