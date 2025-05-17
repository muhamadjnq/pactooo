<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
          $table->id();
          $table->string('code')->unique();
          $table->decimal('amount', 10, 2)->nullable(); // مقدار ثابت تخفیف
          $table->integer('percentage')->nullable(); // درصد تخفیف
          $table->dateTime('expires_at')->nullable(); // تاریخ انقضا
          $table->integer('usage_limit')->nullable(); // تعداد استفاده مجاز
          $table->integer('times_used')->default(0); // تعداد دفعات استفاده‌شده
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
