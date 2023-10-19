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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('subscribe_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('reference');
            $table->date('expired');
            $table->integer('amout');
            $table->integer('fee_amout');
            $table->enum('payment_method', ['BNIVA', 'MANDIRIVA']);
            $table->enum('status', ['UNPAID', 'PAID', 'EXPIRED', 'FAILED', 'REFUND']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
