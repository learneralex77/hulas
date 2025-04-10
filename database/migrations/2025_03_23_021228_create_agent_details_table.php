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
            $table->text('state_agent_name_en');  
            $table->text('state_agent_name_np')->nullable();
            $table->text('address_en')->nullable(); 
            $table->text('address_np')->nullable()->nullable();
            $table->text('contact_no_en')->nullable(); 
            $table->text('contact_no_np')->nullable(); 
            $table->text('contact_person_en')->nullable();   
            $table->text('contact_person_np')->nullable(); 
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
        Schema::dropIfExists('agent_details');
    }
};
