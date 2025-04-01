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
        Schema::create('agent_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained()->onDelete('cascade');
            $table->text('state_agent_name');  // JSON array of names
            $table->text('address')->nullable(); // JSON array of addresses
            $table->text('contact_no')->nullable(); // JSON array of contact numbers
            $table->text('contact_person')->nullable(); // JSON array of contact persons
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_details');
    }
};
