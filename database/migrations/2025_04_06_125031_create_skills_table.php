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
        // способности / заклинания /
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->morphs('caster'); // морф связь
            $table->string('name'); // название
            $table->string('description'); // текстовое описание действия
            $table->integer('lvl')->default(1); // уровень получения способности
            $table->string('script')->nullable(); // путь до файла со скриптом выполнения
            $table->boolean('set_price'); // ограничено ли применение способности
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
