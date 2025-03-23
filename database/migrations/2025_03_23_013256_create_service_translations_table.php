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
        Schema::create('service_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->text('name'); // Text field to store JSON array of names
            $table->text('icon')->nullable(); // Text field to store JSON array of icons
            $table->text('description')->nullable(); // Text field to store JSON array of descriptions
            $table->string('language_code')->default('en'); // For future language support
            $table->timestamps();
            
            // Add unique constraint to ensure one record per service per language
            $table->unique(['service_id', 'language_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_translations');
    }
};
