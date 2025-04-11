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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo', 191)->nullable();
            $table->string('primary_logo', 191)->nullable();
            $table->string('secondary_logo', 191)->nullable();
            $table->string('title_en', 191);
            $table->string('title_np', 191)->nullable();
            $table->string('feedback_notify_email', 191);
            $table->text('google_maplink')->nullable();
            $table->string('agent_notify_email', 191);
            $table->text('description_en');
            $table->text('description_np');
            $table->string('email', 191);
            $table->string('PO_Box', 100);
            $table->text('address_en')->nullable();
            $table->text('address_np')->nullable();
            $table->text('phone_number_en')->nullable();
            $table->text('phone_number_np')->nullable();
            $table->string('canonical_url', 191);
            $table->longText('schema_markup')->nullable();
            $table->text('keyword');
            $table->string('facebook', 191)->nullable();
            $table->string('twitter', 191)->nullable();
            $table->string('linkedin', 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
