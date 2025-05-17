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
        Schema::create('products', function (Blueprint $table) {
          $table->id();
          $table->string('name'); // نام خدمت
          $table->string('title'); // عنوان
          $table->decimal('price', 30, 2)->nullable();
          $table->enum('type', ['fixed', 'view_based', 'package', 'campaign'])->default('fixed'); // نوع محصول
          $table->string('link'); // لینک
          $table->string('slug')->unique(); // لینک اختصاصی
          $table->string('image')->nullable(); // ستون عکس
          $table->text('description')->nullable(); // توضیحات
          $table->unsignedBigInteger('sales_count')->default(0); // تعداد فروش
          $table->unsignedBigInteger('views_count')->default(0); // تعداد بازدید
          $table->boolean('is_active')->default(true); // فعال بودن محصول
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
