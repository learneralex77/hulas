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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_np')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_np')->nullable();
            $table->string('phone_number_en')->nullable();
            $table->string('phone_number_np')->nullable();
            $table->string('email')->nullable();
            $table->text('map_iframe')->nullable();
            $table->boolean('is_published')->default(true);
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
