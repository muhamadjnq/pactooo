<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('blogs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('author_id');
        $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('title')->unique();
        $table->text('body');
        $table->string('slug')->unique();
        $table->string('img')->nullable();
        $table->enum('status',['active','draft','inactive'])->default('draft');
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
        Schema::dropIfExists('blogs');
    }
};
