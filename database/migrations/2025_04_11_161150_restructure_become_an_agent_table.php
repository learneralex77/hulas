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
        Schema::table('become_an_agent', function (Blueprint $table) {
            // Drop all existing columns except id and timestamps
            $table->dropColumn([
                'title_en',
                'title_np',
                'description_en',
                'description_np',
                'images',
                'display_order',
                'is_published'
            ]);
            
            // Add new columns
            $table->string('name');
            $table->string('contact_number');
            $table->string('email');
            $table->string('district');
            $table->text('message');
            $table->boolean('is_contacted')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('become_an_agent', function (Blueprint $table) {
            // Drop the new columns
            $table->dropColumn([
                'name',
                'contact_number',
                'email',
                'district',
                'message',
                'is_contacted'
            ]);
            
            // Add back the original columns
            $table->string('title_en')->nullable();
            $table->string('title_np')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->json('images')->nullable()->comment('Multiple images stored as JSON array');
            $table->integer('display_order')->default(0);
            $table->boolean('is_published')->default(true);
        });
    }
};
