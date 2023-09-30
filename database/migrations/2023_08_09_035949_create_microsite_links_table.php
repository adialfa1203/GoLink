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
        Schema::create('microsite_links', function (Blueprint $table) {
            $table->id();
            $table->string('microsite_uuid')->nullable();
            $table->foreign('microsite_uuid')->references('id')->on('microsites')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('page_id')->references('id')->on('microsite_pages')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('click_timestamp');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microsite_links');
    }
};
