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
        Schema::table('customers', function (Blueprint $table) {
            // Adding a new 'type' column to distinguish between registered and guest users
            $table->enum('type', ['Registered', 'Guest'])->default('Registered')->after('id');

            // Making 'name' field nullable for guest users
            $table->string('name')->nullable()->change();

            // Making 'email' field nullable for guest users
            $table->string('email')->nullable()->change();

            // Making 'password' field nullable for guest users
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // Reverting the 'type' column
            $table->dropColumn('type');

            // Reverting the changes to 'name', 'email', and 'password' columns
            $table->string('name')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('password')->nullable(false)->change();
        });
    }
};
