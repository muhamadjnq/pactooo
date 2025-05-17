@php $minimumViews = $category->minimum_views ?? 1; @endphp
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>نام محصول</th>
            <th>قیمت</th>
            <th>حداقل سفارش</th>
            <th>عملیات</th>
            <th>قیمت نهایی</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr data-product-id="{{ $product->id }}" data-price="{{ $product->price }}">
            <td>{{ $product->title }}</td>
            <td>
                <span class="unit-price" data-price="{{ $product->price }}">
                    {{ number_format($product->price) }} تومان
                </span>
            </td>
            <td>{{ $minimumViews }} هزار بازدید</td>
            <td>
                <form action="{{ route('user.orders.add-product', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input
                        class="form-control quantity"
                        value="{{ $minimumViews }}"
                        type="number"
                        name="quantity"
                        data-min-order="{{ $minimumViews }}"
                        required>
                    <button class="btn btn-primary btn-sm" type="submit" disabled>افزودن به سفارش</button>
                </form>
            </td>
            <td>
                <span class="total-price">
                    قیمت نهایی: {{ number_format($product->price * $minimumViews) }} تومان
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">محصولی وجود ندارد.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const quantityInputs = document.querySelectorAll(".quantity");

    quantityInputs.forEach(input => {
        const form = input.closest("form");
        const submitButton = form.querySelector("button[type='submit']");
        const row = input.closest("tr");
        const unitPrice = parseFloat(row.querySelector(".unit-price").getAttribute("data-price")); // قیمت هر واحد
        const minOrder = parseInt(input.getAttribute("data-min-order"), 10); // حداقل بازدید از HTML
        const totalPriceElement = row.querySelector(".total-price");

        // تابع برای بررسی و محاسبه قیمت نهایی
        function validateAndCalculate() {
            const value = parseInt(input.value, 10) || 0;

            if (value < minOrder) {
                // اگر مقدار کمتر از حداقل باشد
                totalPriceElement.textContent = "قیمت نهایی: -";
                submitButton.disabled = true; // دکمه غیرفعال شود
            } else {
                // اگر مقدار معتبر باشد
                const totalPrice = unitPrice * value;
                const formattedPrice = totalPrice.toLocaleString(); // فرمت کردن قیمت
                totalPriceElement.textContent = "قیمت نهایی: " + formattedPrice + " تومان";
                submitButton.disabled = false; // دکمه فعال شود
            }
        }

        // بررسی اولیه
        validateAndCalculate();

        // بررسی تغییرات در ورودی
        input.addEventListener("input", validateAndCalculate);
    });
});
</script>
