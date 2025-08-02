<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // предыстории
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manual')->default('https://dnd.su/backgrounds/');
            $table->string('source')->default("Player`s handbook");
            $table->json('equipment'); // массив вариантов доступного снаряжения на старте
            $table->string('skill_title')->nullable(); // заголовок умения
            $table->text('skill_description')->nullable(); // текст умения
        });

        // связь с владением
        Schema::create('background_proficiency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('background_id')->constrained('backgrounds')->cascadeOnDelete();
            $table->foreignId('proficiency_id')->constrained('proficiencies')->cascadeOnDelete();
        });
        // связь с навыками
        Schema::create('ability_background', function (Blueprint $table) {
            $table->id();
            $table->foreignId('background_id')->constrained('backgrounds')->cascadeOnDelete();
            $table->foreignId('ability_id')->constrained('abilities')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('background_proficiencies');
        Schema::dropIfExists('background_abilities');
        Schema::dropIfExists('backgrounds');
    }
};
