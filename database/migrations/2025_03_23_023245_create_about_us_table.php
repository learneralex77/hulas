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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable();
            $table->text('description')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->text('short_description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->json('mission_vision')->nullable()->comment('Contains title, icon, and description for multiple entries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
