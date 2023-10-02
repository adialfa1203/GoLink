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
        Schema::create('takedown_microsites', function (Blueprint $table) {
            $table->id();
            $table->string('id_microsite')->nullable();
            $table->string('components_uuid')->nullable();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('link_microsite')->nullable();
            $table->string('image')->nullable();
            $table->string('name_microsite')->nullable();
            $table->string('description')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('qr_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takedown_microsites');
    }
};
