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
        Schema::create('agent_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_np')->nullable();
            $table->string('number_en')->default('0');
            $table->string('number_np')->default('0');

            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->integer('display_order')->default(0);
            $table->string('email');
            $table->text('message_en')->nullable();
            $table->text('message_np')->nullable();

            $table->text('address_en')->nullable();
            $table->text('address_np')->nullable();

            $table->boolean('is_processed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_forms');
    }
};
