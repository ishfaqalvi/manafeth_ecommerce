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
        Schema::create('rent_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreignId('product_rent_id')->references('id')->on('product_rents')->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->bigInteger('from');
            $table->bigInteger('to');
            $table->string('token')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_links');
    }
};
