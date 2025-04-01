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
            $table->string('name');
            $table->string('number')->default('0');
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->integer('display_order')->default(0);
            $table->string('email');
            $table->text('message')->nullable();
            $table->text('address')->default('');
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
