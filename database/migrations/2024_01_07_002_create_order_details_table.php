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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->string('serial_number')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('warranty')->default(0);
            $table->integer('maintenance')->default(0);
            $table->integer('price');
            $table->bigInteger('delivery_charges')->nullable();
            $table->integer('star')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
