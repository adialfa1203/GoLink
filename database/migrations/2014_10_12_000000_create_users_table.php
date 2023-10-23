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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->enum('subscribe', ['free', 'silver', 'gold', 'platinum'])->default('free');
            $table->string('password');
            $table->string('google_id')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('verification_code')->nullable();
            $table->boolean('is_banned')->default(false);
            $table->datetime('subscription_start_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
