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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            // Basic service information
            $table->string('name_en');
            $table->string('name_np')->nullable();

            $table->string('icon')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();

            $table->string('slug')->unique();
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->string('file')->nullable(); // For storing file path

            // Fields from service_translations
            $table->text('translation_names')->nullable(); // JSON array of translated names
            $table->string('translation_icons')->nullable(); // For storing image file path (supports all types including .webp)
            $table->text('translation_descriptions')->nullable(); // JSON array of translated descriptions
            $table->text('external_link')->nullable(); // JSON array of external links
            $table->string('language_code')->default('en'); // Default language code

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
