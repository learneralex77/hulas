<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('forex_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->json('slots');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forex_rates');
    }
};
