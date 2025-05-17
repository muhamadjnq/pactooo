<table class="table table-striped">
    <thead>
        <tr>
            <th>نام محصول</th>
            <th>قیمت</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ number_format($product->price) }} تومان</td>
            <td>
                <form action="{{ route('user.orders.add-product', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="number" name="quantity" class="form-control mb-2" placeholder="تعداد" min="1" required>
                    <button class="btn btn-primary btn-sm" type="submit">افزودن به سفارش</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">محصولی وجود ندارد.</td>
        </tr>
        @endforelse
    </tbody>
</table>
