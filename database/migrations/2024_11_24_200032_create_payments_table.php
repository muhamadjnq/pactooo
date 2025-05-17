<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // اتصال به کاربران
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // اتصال به سفارشات
            $table->unsignedBigInteger('amount'); // مبلغ پرداختی
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending'); // وضعیت پرداخت
            $table->string('transaction_id')->nullable(); // شناسه تراکنش
            $table->string('gateway')->default('zarinpal'); // نام درگاه
            $table->json('details')->nullable(); // ذخیره جزئیات اضافی
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
