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
        Schema::create('become_an_agent', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_np')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->json('images')->nullable()->comment('Multiple images stored as JSON array');
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('become_an_agent');
    }
};
