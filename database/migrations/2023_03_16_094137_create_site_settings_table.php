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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('site_name')->nullable();
            $table->string('site_slogan')->nullable();
            $table->string('site_title')->nullable();
            $table->mediumText('site_des')->nullable();
            $table->string('site_image')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number2')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->mediumText('team_des')->nullable();
            $table->mediumText('contact_des')->nullable();
            $table->mediumText('service_des')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
