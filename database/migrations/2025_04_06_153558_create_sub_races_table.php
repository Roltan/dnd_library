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
        // под расы
        Schema::create('sub_races', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название
            $table->foreignId('race_id')->constrained('races')->cascadeOnDelete(); // родительская раса
            $table->json('abilities_bonus')->nullable(); // увеличение характеристик
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_races');
    }
};
