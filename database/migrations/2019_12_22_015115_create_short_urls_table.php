<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('short_urls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('destination_url')->nullable();
            $table->string('url_key')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('microsite_uuid')->nullable();
            $table->foreign('microsite_uuid')->references('id')->on('microsites')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('custom_name', ['yes', 'no'])->default('no');
            $table->string('title')->nullable();
            $table->string('password')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('deleted_add')->nullable();
            $table->string('default_short_url');
            $table->boolean('single_use');
            $table->bigInteger('click_count')->nullable();
            $table->enum('archive', ['yes', 'no'])->default('no');
            $table->boolean('track_visits');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('short_urls');
    }
}
