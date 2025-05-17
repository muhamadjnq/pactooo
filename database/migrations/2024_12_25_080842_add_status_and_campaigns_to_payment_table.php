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
      Schema::table('payments', function (Blueprint $table) {
        $table->unsignedBigInteger('campaign_id')->nullable()->after('order_id');
        $table->unsignedBigInteger('order_id')->nullable()->change();

        $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn(['campaign_id', 'order_id']);
        });
    }
};
