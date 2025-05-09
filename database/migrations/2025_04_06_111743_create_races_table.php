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
        // расы
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название
            $table->string('manual')->default('https://dnd.su/race/');
            $table->string('source')->default("Player`s handbook");
            $table->integer('speed'); // скорость перемещения
            $table->string('size')->default("Средний"); // размер существа
            $table->integer('height'); // средний рост взрослых особей
            $table->integer('weight')->nullable(); // средний вес взрослых особей
            $table->json('lang')->nullable(); // массив доступных языков
            $table->json('ideology'); // массив доступных идеологий
            $table->json('abilities_bonus')->nullable(); // увеличение характеристик
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
