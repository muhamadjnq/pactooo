@extends('admin.layout')

@section('content')
    <h1>مدیریت دسته بندی‌ها</h1>

    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">ایجاد دسته بندی جدید</a>

    <table class="table">
        <thead>
            <tr>
                <th>نام</th>
                <th>نوع</th>
                <th>بودجه</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorys as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->type }}</td>
                    <td>{{ $category->budget }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('admin.category.destroy', $category) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categorys->links() }} <!-- صفحه‌بندی -->
@endsection
