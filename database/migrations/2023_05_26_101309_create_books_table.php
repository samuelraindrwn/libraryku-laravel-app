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
        Schema::create('books', function (Blueprint $table) {
            $table->string('book_id',20)->primary();
            $table->string('book_title',255);
            $table->string('publisher',100);
            $table->unsignedBigInteger('category_id');
            $table->date('release_date');
            $table->string('author',100);
            $table->integer('page');
            $table->string('synopsis',2500);
            $table->string('cover',255);
            $table->string('pdf',255);
            $table->integer('search_count')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};