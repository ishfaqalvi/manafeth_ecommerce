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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('sub_category_id')->references('id')->on('sub_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('serial_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('model')->nullable();
            $table->text('thumbnail');
            $table->integer('quantity');
            $table->integer('warranty')->default(0);
            $table->integer('maintenance')->default(0);
            $table->bigInteger('price');
            $table->bigInteger('discount')->nullable();
            $table->enum('type',['Rent','Sale','Maintenance']);
            $table->string('special')->nullable();
            $table->enum('status',['Publish','Unpublish'])->default('Publish');
            $table->text('description')->nullable();
            $table->text('features')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
