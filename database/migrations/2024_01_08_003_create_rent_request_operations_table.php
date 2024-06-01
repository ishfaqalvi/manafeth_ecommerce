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
        Schema::create('rent_request_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rent_request_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('actor_id');
            $table->string('actor_type');
            $table->string('action');
            $table->timestamp('performed_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_request_operations');
    }
};