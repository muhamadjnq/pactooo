@extends('layouts.user')
@section('content')
<br>
<div class="container-fluid">
  <h3>تبلیغات {{ $category->name }}</h3>@php $minimumViews = $category->minimum_views ?? 1; @endphp
    <div class="col-xl-12">
              <div class="card text-center mb-3">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills d-flex gap-1" role="tablist" style="flex-wrap: nowrap;padding:0">
                        <li class="nav-item" role="presentation">
                            <button aria-controls="navs-pills-within-card-active" aria-selected="true" class="nav-link active" data-bs-target="#navs-pills-within-card-active" data-bs-toggle="tab" role="tab" type="button"> بازدیدی {{ $category->name }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button aria-controls="navs-pills-within-card-link" aria-selected="false" class="nav-link" data-bs-target="#navs-pills-within-card-link" data-bs-toggle="tab" role="tab" type="button"> تعرفه ای {{ $category->name }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button aria-controls="navs-pills-within-card-pack" aria-selected="false" class="nav-link" data-bs-target="#navs-pills-within-card-pack" data-bs-toggle="tab" role="tab" type="button">پیشنهاد ویژه {{ $category->name }}</button>
                        </li>
                    </ul>
                  </div>
                  <div class="card-body">
                      <div class="tab-content p-0">
                          <div class="tab-pane fade active show" id="navs-pills-within-card-active" role="tabpanel">
                            <div class="row mb-4">
                              @foreach($variableProducts as $product)
                                <!--  Pricing -->
                                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5>{{ $product->name }}</h5>
                                            <p>{{ $product->description }}</p>
                                            <h5 class="unit-price" data-price="{{ $product->price }}">
                                                @if ($product->type === 'view_based')
                                                    قیمت هر هزار بازدید: {{ number_format($product->price, 0) }} تومان
                                                @elseif ($product->type === 'fixed')
                                                    قیمت ثابت: {{ number_format($product->price, 0) }} تومان
                                                @elseif ($product->type === 'package')
                                                    قیمت پکیج: {{ number_format($product->price, 0) }} تومان
                                                @endif
                                            </h5>
                                            <form action="{{ route('user.orders.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <h5>تعداد بازدید (حداقل {{ $minimumViews }} هزار تا):<input class="form-control quantity" value="{{ $minimumViews }}" min="" type="number" name="quantity" style="width: 30%; display: inline;"></h5>
                                                <h5 class="total-price">قیمت نهایی:</h5><br>
                                                <button class="btn btn-primary waves-effect waves-light" data-bs-target="#pricingModal" data-bs-toggle="modal" type="submit">ثبت سفارش</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--/ Pricing -->
                            @endforeach
                          </div>
                        </div>
                          <div class="tab-pane fade" id="navs-pills-within-card-link" role="tabpanel">
                            <div class="row mb-4">
                              @foreach($fixedProducts as $product)
                                                <!--  Pricing -->
                                                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                          <div class="d-flex align-items-start">
                                                          <div class="d-flex align-items-start avatar avatar-xl me-3">
                                                            <img alt="{{ $product->name }}" class="rounded-circle" src="{{ asset('storage/' . $product->image) }}" style="width: 40px;height:40px;">
                                                          </div>
                                                          <h5 class="d-flex align-items-start p-2 me-3">{{ $product->title }}</h5>
                                                          </div>
                                                            <p>{{ $product->description }}</p>
                                                            <h5>قیمت: {{ number_format($product->price, 0) }} تومان</h5>
                                                            <form action="{{ route('user.products.order', $product->id) }}" method="POST">
                                                                @csrf
                                                                <input hidden class="form-control" value="1" min="1" type="number" name="quantity">
                                                                <button class="btn btn-primary waves-effect waves-light" data-bs-target="#pricingModal" data-bs-toggle="modal" type="submit"> ثبت سفارش</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/  Pricing -->
                                                @endforeach
                                            </div>
                          </div>
                          <div class="tab-pane fade" id="navs-pills-within-card-pack" role="tabpanel">
                            <div class="row mb-4">
                              @foreach($packageProducts as $product)
                                                <!--  Pricing -->
                                                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                          <div class="d-flex align-items-start">
                                                          <div class="d-flex align-items-start avatar avatar-xl me-3">
                                                            <img alt="{{ $product->name }}" class="rounded-circle" src="{{ asset('storage/' . $product->image) }}" style="width: 40px;height:40px;">
                                                          </div>
                                                          <h5 class="d-flex align-items-start p-2 me-3">{{ $product->title }}</h5>
                                                          </div>
                                                            <p>{{ $product->description }}</p>
                                                            <h5>قیمت: {{ number_format($product->price, 0) }} تومان</h5>
                                                            <form action="{{ route('user.products.order', $product->id) }}" method="POST">
                                                                @csrf
                                                                <input hidden class="form-control" value="1" min="1" type="number" name="quantity">
                                                                <button class="btn btn-primary waves-effect waves-light" data-bs-target="#pricingModal" data-bs-toggle="modal" type="submit"> ثبت سفارش</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/  Pricing -->
                                                @endforeach
                                            </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            </div>
            <script>
                  document.querySelectorAll('.card').forEach(function(card) {
                  const unitPriceElement = card.querySelector('.unit-price');
                  const quantityInput = card.querySelector('.quantity');
                  const totalPriceElement = card.querySelector('.total-price');
                  const minimumViews = parseInt(quantityInput.getAttribute('min'), 10);

                  function calculateTotalPrice() {
                      // گرفتن قیمت هر بازدید
                      const unitPrice = parseFloat(unitPriceElement.dataset.price);
                      // گرفتن تعداد وارد شده یا مقدار پیش‌فرض حداقل
                      let quantity = parseInt(quantityInput.value, 10) || minimumViews;
                      if (quantity < minimumViews) {
                          quantity = minimumViews;
                          quantityInput.value = minimumViews; // اصلاح مقدار اینپوت
                      }
                      // محاسبه قیمت نهایی
                      let totalPrice = unitPrice * quantity;
                      totalPrice = totalPrice.toLocaleString();
                      // نمایش قیمت نهایی
                      totalPriceElement.innerText = "قیمت نهایی: " + totalPrice + " تومان";
                  }

                  // اضافه کردن رویداد به اینپوت
                  quantityInput.addEventListener('input', calculateTotalPrice);

                  // محاسبه اولیه هنگام بارگذاری صفحه
                  calculateTotalPrice();
                  });
            </script>
            <script>
    document.addEventListener("DOMContentLoaded", function () {
        const quantityInputs = document.querySelectorAll(".quantity");
        const minimumViews = {{ $minimumViews }};

        quantityInputs.forEach(input => {
            const form = input.closest("form");
            const submitButton = form.querySelector("button[type='submit']");

            // تابع برای بررسی مقدار ورودی
            function validateInput() {
                const value = parseInt(input.value, 10) || 0;
                if (value < minimumViews) {
                    submitButton.disabled = true; // غیرفعال کردن دکمه
                } else {
                    submitButton.disabled = false; // فعال کردن دکمه
                }
            }

            // بررسی اولیه
            validateInput();

            // بررسی تغییرات در ورودی
            input.addEventListener("input", validateInput);
        });
    });
</script>
@endsection
