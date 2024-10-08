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
        Schema::create('rent_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->enum('payment_method',['Cash On Delivery']);
            $table->string('on_delivery_payment_method')->nullable();
            $table->enum('collection_type',['Self Pickup','Home Delivery']);
            $table->bigInteger('collection_date');
            $table->foreignId('time_slot_id')->references('id')->on('time_slots')->cascadeOnDelete();
            $table->integer('discount')->nullable();
            $table->integer('payment')->nullable();
            $table->enum('payment_received',['Yes', 'No'])->default('No');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();
            $table->enum('status',['Pending','Cancelled','Confirmed','Processing','Ready for Pickup','Out For Delivery','Delivered','Returning','Ready For Return','Out For Return','Returned','Collecting','Collected','Completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_requests');
    }
};
