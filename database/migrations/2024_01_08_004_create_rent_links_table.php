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
            $table->enum('collection_type',['Self Pickup','Home Delivery']);
            $table->bigInteger('collection_date');
            $table->foreignId('time_slot_id')->references('id')->on('time_slots')->cascadeOnDelete();
            $table->text('address')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();
            $table->enum('price_change_type', ['increment', 'decrement'])->nullable();
            $table->bigInteger('price_change_value')->nullable();
            $table->string('token')->unique();
            $table->morphs('linkable');
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
