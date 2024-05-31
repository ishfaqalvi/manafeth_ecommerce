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
        Schema::create('maintenence_requests', function (Blueprint $table) {
            $table->id();
            $table->string('request_no')->nullable();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('address');
            $table->integer('payment')->nullable();
            $table->enum('payment_received',['Yes', 'No'])->default('No');
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->text('message');
            $table->string('images');
            $table->enum('status',['Pending','Accepted','Rejected','Assigned','Out for Maintenance','Ready to go','Done','Closed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenence_requests');
    }
};
