@extends('admin.layout')

@section('content')
<div class="container-fluid">
    <div class="breadcrumb-header justify-content-between">
        <h4 class="content-title mb-0 my-auto">مدیریت کمپین‌ها</h4>
        <a href="{{ route('admin.campaign.create') }}">
            <button class="btn btn-primary">ایجاد کمپین جدید</button>
        </a>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title">لیست کمپین‌ها</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>نام کمپین</th>
                        <th>بودجه</th>
                        <th>وضعیت</th>
                        <th>تاریخ شروع</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($campaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->name }}</td>
                        <td>{{ number_format($campaign->budget) }} تومان</td>
                        <td>{{ $campaign->status }}</td>
                        <td>{{ $campaign->start_date }}</td>
                        <td>
                            <a href="{{ route('admin.campaign.edit', $campaign) }}" class="btn btn-sm btn-info">ویرایش</a>
                            <form action="{{ route('admin.campaign.destroy', $campaign) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">هیچ کمپینی وجود ندارد!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $campaigns->links() }}
        </div>
    </div>
</div>
@endsection
