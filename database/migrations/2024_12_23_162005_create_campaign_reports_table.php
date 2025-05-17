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
        Schema::create('campaign_reports', function (Blueprint $table) {
          $table->id(); // شناسه گزارش
          $table->foreignId('campaign_id')->constrained('campaigns')->onDelete('cascade'); // کلید خارجی برای کمپین
          $table->integer('clicks')->default(0); // تعداد کلیک‌ها
          $table->integer('impressions')->default(0); // تعداد بازدیدها
          $table->integer('audience_growth')->default(0); // افزایش مخاطبین
          $table->decimal('ctr', 5, 2)->default(0.00); // نرخ کلیک (CTR)
          $table->date('report_date'); // تاریخ گزارش
          $table->timestamps(); //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_reports');
    }
};
