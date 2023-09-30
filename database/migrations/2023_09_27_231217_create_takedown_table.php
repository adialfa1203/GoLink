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
        Schema::create('takedown', function (Blueprint $table) {
            $table->id();
            $table->text('destination_url')->nullable();
            $table->string('url_key')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('microsite_uuid')->nullable();
            $table->enum('custom_name', ['yes', 'no'])->default('no');
            $table->string('title')->nullable();
            $table->string('password')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('deleted_add')->nullable();
            $table->string('default_short_url')->nullable();
            $table->boolean('single_use')->nullable();
            $table->bigInteger('click_count')->nullable();
            $table->enum('archive', ['yes', 'no'])->default('no');
            $table->boolean('track_visits')->nullable();
            $table->integer('redirect_status_code')->nullable();
            $table->boolean('track_ip_address')->nullable();
            $table->boolean('track_operating_system')->nullable();
            $table->boolean('track_operating_system_version')->nullable();
            $table->boolean('track_browser')->nullable();
            $table->boolean('track_browser_version')->nullable();
            $table->boolean('track_referer_url')->nullable();
            $table->boolean('track_device_type')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('takedown');
    }
};
