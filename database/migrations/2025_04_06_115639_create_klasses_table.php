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
        // классы
        Schema::create('klasses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manual')->default('https://dnd.su/class/');
            $table->string('source')->default("Player`s handbook");
            $table->integer('dice_hp');
            $table->json('save_stat'); // массив владений спас бросками
            $table->integer('abilities_count'); // сколько навыков можно взять
            $table->json('equipment'); // массив вариантов доступного снаряжения на старте
            $table->string('money'); // монеты вместо снаряжения
            $table->integer('sub_klass_lvl'); // уровень получения подкласса

            $table->string('abilities_spell')->nullable(); // заклинательная характеристика
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasses');
    }
};
