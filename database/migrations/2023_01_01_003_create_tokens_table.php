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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable()->index();
            $table->string('mobile_number')->nullable()->index();
            $table->integer('otp');
            $table->dateTime('expiry_time');
            $table->boolean('used')->default(false);
            $table->timestamps();

            // Ensuring that either email or mobile_number can be unique (but not both null)
            $table->unique(['email', 'mobile_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokens');
    }
};
