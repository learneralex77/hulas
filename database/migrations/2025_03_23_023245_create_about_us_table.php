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
            $table->string('tagline_en')->nullable();
            $table->string('tagline_np')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->string('years_of_experience_en')->nullable();
            $table->string('years_of_experience_np')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_np')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->json('mission_vision')->nullable()->comment('Contains title, icon, and description for multiple entries');
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
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
