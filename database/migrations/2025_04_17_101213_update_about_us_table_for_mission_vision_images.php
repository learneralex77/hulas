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
        Schema::table('about_us', function (Blueprint $table) {
            // Add a new JSON column to store mission_vision_images
            $table->json('mission_vision_images')->nullable()->after('mission_vision')
                ->comment('Contains image paths for mission_vision items, indexed to match mission_vision array');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('mission_vision_images');
        });
    }
};
