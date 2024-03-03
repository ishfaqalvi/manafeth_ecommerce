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
            $table->string('serial_number');
            $table->string('engine_number');
            $table->string('model');
            $table->text('description');
            $table->text('detail')->nullable();
            $table->text('thumbnail');
            $table->integer('quantity');
            $table->bigInteger('price');
            $table->bigInteger('discount')->nullable();
            $table->string('rent')->nullable();
            $table->string('maintenance')->nullable();
            $table->string('special')->nullable();
            $table->enum('status',['Publish','Unpublish'])->default('Publish');
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
