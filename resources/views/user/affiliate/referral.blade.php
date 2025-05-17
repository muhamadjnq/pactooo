@extends('layouts.user')
@section('title', 'Referral Link')
@section('content')
<div class="container">
  <br>
    <h1 class="ms-1 mb-0">لینک رفرال تون را به اشتراک بگذارید</h1>
    <div class="card my-4">
        <div class="card-body">
          <p id="copyMessage" style="display: none; color: green; font-weight: bold;">کپی شد!</p>
            <p>کد رفرال شما:</p>
            <input type="text" id="referralLink" class="form-control text-center" value="{{ $referral_link }}" readonly>
            <button id="copyButton" class="btn btn-primary mt-3">کپی لینک</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('copyButton').addEventListener('click', function () {
        const referralInput = document.getElementById('referralLink');

        // کپی کردن لینک به کلیپ‌بورد
        navigator.clipboard.writeText(referralInput.value).then(() => {
            const copyMessage = document.getElementById('copyMessage');
            // نمایش پیام تأیید
            copyMessage.style.display = 'block';

            // مخفی کردن پیام پس از 3 ثانیه
            setTimeout(() => {
                copyMessage.style.display = 'none';
            }, 3000);
        }).catch(err => {
            console.error('Failed to copy: ', err);
            alert('مرورگر خود را رفرش کنید و دوباره امتحان کنید!');
        });
    });
</script>
@endsection
