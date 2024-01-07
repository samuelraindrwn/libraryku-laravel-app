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
        Schema::create('reservations', function (Blueprint $table) {
            $table->uuid('reservation_id')->primary();
            $table->uuid('reser_detail_id');
            $table->uuid('user_id');
            $table->date('reservation_date');
            $table->date('return_date');
            $table->string('name',100);
            $table->unsignedBigInteger('status_id')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('reser_detail_id')->references('reser_detail_id')->on('reservation_details')->onDelete('cascade');
            $table->foreign('status_id')->references('status_id')->on('statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};