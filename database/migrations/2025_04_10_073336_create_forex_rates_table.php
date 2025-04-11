<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('forex_rates', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->enum('time_slot', ['morning', 'afternoon']);
            $table->string('flag')->nullable();
            $table->string('currency');
            $table->integer('unit')->default(1);
            $table->decimal('buying_rate', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forex_rates');
    }
};
