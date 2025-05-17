@extends('layouts.user')
@section('content')
<div class="container">
    <h1>جستجوی پیشرفته محصولات</h1>

    <!-- فرم جستجو -->
    <form id="searchForm">
        <div class="form-group">
            <label for="category_id">دسته‌بندی:</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">همه</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="type">نوع محصول:</label>
            <input type="text" name="type" id="type" class="form-control" placeholder="مثال: دیجیتال">
        </div>

        <div class="form-group">
            <label for="min_price">حداقل قیمت:</label>
            <input type="number" name="min_price" id="min_price" class="form-control">
        </div>

        <div class="form-group">
            <label for="max_price">حداکثر قیمت:</label>
            <input type="number" name="max_price" id="max_price" class="form-control">
        </div>

        <div class="form-group">
            <label for="sort_by">مرتب‌سازی:</label>
            <select name="sort_by" id="sort_by" class="form-control">
                <option value="">پیش‌فرض</option>
                <option value="highest_price">گران‌ترین</option>
                <option value="lowest_price">ارزان‌ترین</option>
                <option value="best_selling">پرفروش‌ترین</option>
                <option value="most_viewed">پربازدید‌ترین</option>
            </select>
        </div>

        <button type="button" id="searchButton" class="btn btn-primary mt-3">جستجو</button>
    </form>

    <!-- بخش نمایش نتایج -->
    <div id="searchResults" class="mt-4"></div>
</div>

<script>
document.getElementById('searchButton').addEventListener('click', function () {
let formData = new FormData(document.getElementById('searchForm'));
let query = new URLSearchParams(formData).toString();

fetch(`/user/products/search?${query}`)
    .then(response => {
        if (!response.ok) {
            throw new Error('خطا در درخواست سرور');
        }
        return response.json();
    })
    .then(data => {
        let resultsDiv = document.getElementById('searchResults');
        resultsDiv.innerHTML = '';

        if (data.length === 0) {
            resultsDiv.innerHTML = '<p>هیچ محصولی یافت نشد.</p>';
        } else {
            data.forEach(product => {
                let productDiv = document.createElement('div');
                productDiv.className = 'product';
                productDiv.innerHTML = `
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">${product.name}</h5>
                            <p class="card-text">قیمت: ${product.price} تومان</p>
                            <p class="card-text">تعداد فروش: ${product.sales_count}</p>
                            <p class="card-text">تعداد بازدید: ${product.views_count}</p>
                        </div>
                    </div>
                `;
                resultsDiv.appendChild(productDiv);
            });
        }
    })
    .catch(error => {
        console.error('خطا در دریافت داده‌ها:', error);
        alert('خطایی رخ داد. لطفاً دوباره تلاش کنید.');
    });
});
</script>
@endsection
