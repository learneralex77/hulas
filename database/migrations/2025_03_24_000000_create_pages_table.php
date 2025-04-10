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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->foreignId('menu_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title_en');
            $table->string('title_np')->nullable();
            $table->integer('display_order')->default(0);
            $table->longText('content_en')->nullable();
            $table->longText('content_np')->nullable();
            $table->string('image')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_np')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
}; 