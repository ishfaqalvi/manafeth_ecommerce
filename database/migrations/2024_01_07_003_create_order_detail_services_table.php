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
        Schema::create('order_detail_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_detail_id')->references('id')->on('order_details')->cascadeOnDelete();
            $table->bigInteger('date');
            $table->enum('status', ['Pending','Completed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail_services');
    }
};
