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
        Schema::table('buttons', function (Blueprint $table) {
            $table->foreignUuid('microsite_uuid')->nullable()->constrained('microsites')->change();
            $table->string('color_hex')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buttons', function (Blueprint $table) {
            $table->foreignUuid('microsite_uuid')->nullable()->constrained('microsites')->change();
            $table->string('color_hex')->nullable()->change();
        });
    }
};
