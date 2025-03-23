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
        // Check if the table exists before trying to drop it
        if (Schema::hasTable('pages')) {
            Schema::dropIfExists('pages');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // We can't recreate the pages table here without the original structure
        // This is a destructive migration with no rollback
    }
};
