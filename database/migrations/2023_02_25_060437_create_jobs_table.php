<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('job_title');
            $table->text('description');
            $table->string('job_location');
            $table->string('contact_email');
            $table->string('web_url')->nullable();
            $table->string('phone')->nullable();
            $table->date('deadline')->nullable();
            $table->string('image')->nullable();
            $table->string('salary')->nullable();
            $table->unsignedBigInteger('job_category_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
