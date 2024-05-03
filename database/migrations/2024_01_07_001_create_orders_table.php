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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->enum('payment_method',['Cash On Delivery']);
            $table->enum('collection_type',['Self Pickup','Home Delivery']);
            $table->bigInteger('collection_date');
            $table->foreignId('time_slot_id')->references('id')->on('time_slots')->cascadeOnDelete();
            $table->integer('discount')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->enum('status',['Processing','Confirmed','On the way','Deliver']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
