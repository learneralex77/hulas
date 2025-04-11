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
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_event_category_id')->constrained('news_event_categories')->onDelete('cascade');
            $table->enum('publication_type', ['News', 'Article', 'Event'])->default('News');
            $table->string('title_en');
            $table->string('title_np')->nullable();
            $table->text('short_description_en')->nullable();
            $table->text('short_description_np')->nullable();
            $table->string('image')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_np')->nullable();
            $table->string('published_by_en')->nullable();
            $table->string('published_by_np')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('display_order')->default(0);
            $table->string('external_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
