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
            $table->string('name');
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->string('slug')->unique();
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(false);
            $table->string('file')->nullable(); // For storing file path
            
            // Fields from service_translations
            $table->text('translation_names')->nullable(); // JSON array of translated names
            $table->text('translation_icons')->nullable(); // JSON array of translated icons
            $table->text('translation_descriptions')->nullable(); // JSON array of translated descriptions
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