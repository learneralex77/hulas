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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_np')->nullable();         
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->integer('display_order')->default(0);
            $table->string('slug')->unique();
            $table->boolean('is_published')->default(true);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
        });

        // Add self-referencing foreign key constraint
        Schema::table('menus', function (Blueprint $table) {
            $table->foreign('parent_id')
                  ->references('id')
                  ->on('menus')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
