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
        Schema::create('socials', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('microsite_uuid')->nullable();
            $table->foreign('microsite_uuid')->references('id')->on('microsites')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('buttons_uuid')->nullable();
            $table->foreign('buttons_uuid')->references('id')->on('buttons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('button_link')->nullable();
            $table->integer('order')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
