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
        Schema::create('rent_request_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('request_id')->references('id')->on('rent_requests')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreignId('product_rent_id')->references('id')->on('product_rents')->cascadeOnDelete();
            $table->integer('quantity')->default(1);
            $table->bigInteger('from');
            $table->bigInteger('to');
            $table->bigInteger('delivery_charges')->nullable();
            $table->bigInteger('discount')->nullable();
            $table->integer('star')->nullable();
            $table->string('remarks')->nullable();
            $table->string('date_extend')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_request_details');
    }
};
