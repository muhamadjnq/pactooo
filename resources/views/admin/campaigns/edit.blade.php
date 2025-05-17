@extends('admin.layout')
@section('content')
<div class="flex-grow-1 container-p-y container-fluid">
    <br>
    <div class="card">
        <h5 class="card-header">{{ isset($campaign) ? 'ویرایش کمپین' : 'ایجاد کمپین جدید' }}</h5>
        <div class="card-body">
            <form method="POST" action="{{ isset($campaign) ? route('admin.campaign.update', $campaign) : route('admin.campaign.store') }}" novalidate>
                @csrf
                @if(isset($campaign))
                    @method('PUT')
                @endif
                <!-- Campaign Details -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">نام کمپین:</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $campaign->name ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">بودجه کمپین:</label>
                        <input type="number" name="budget" class="form-control" value="{{ old('budget', $campaign->budget ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاریخ شروع:</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $campaign->start_date ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">تاریخ پایان:</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $campaign->end_date ?? '') }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">وضعیت:</label>
                        <select name="status" class="form-select" required>
                            <option value="pending" {{ old('status', $campaign->status ?? '') == 'pending' ? 'selected' : '' }}>در انتظار</option>
                            <option value="active" {{ old('status', $campaign->status ?? '') == 'active' ? 'selected' : '' }}>فعال</option>
                            <option value="completed" {{ old('status', $campaign->status ?? '') == 'completed' ? 'selected' : '' }}>تکمیل شده</option>
                            <option value="cancelled" {{ old('status', $campaign->status ?? '') == 'cancelled' ? 'selected' : '' }}>لغو شده</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">اهداف کمپین:</label>
                        <textarea name="objectives" class="form-control" rows="3">{{ old('objectives', $campaign->objectives ?? '') }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">توضیحات:</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $campaign->description ?? '') }}</textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">{{ isset($campaign) ? 'ذخیره تغییرات' : 'ایجاد کمپین' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
