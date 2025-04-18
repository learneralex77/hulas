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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['Management Team', 'BOD']);
            $table->string('name_en');
            $table->string('name_np')->nullable();          
            $table->string('image')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_np')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_np')->nullable();
            $table->string('phone_number_en')->nullable();
            $table->string('phone_number_np')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('teams');
    }
};
