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
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название
            $table->string('scripts'); // путь до скрипта

            $table->longText('description'); // описание
            $table->integer('distance')->nullable(); // дистанция
            $table->integer('time_cast')->nullable(); // время накладывания
            $table->integer('duration')->nullable(); // длительность
            $table->boolean('need_concentration')->default(false); // необходимость концентрации

            $table->boolean('need_verbal')->default(true); // необходимость вербального компонента
            $table->boolean('need_semant')->default(true); // необходимость семантического компонента
            $table->boolean('need_material')->default(false); // необходимость материального компонента
            $table->json('materials')->nullable(); // необходимые материальные компоненты

            $table->integer('lvl')->default(1); // уровень ячейки
            $table->boolean('can_lower_lvl')->default(false); // могут ли использоваться меньшие ячейки
        });

        Schema::create('spell_klass', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spell_id')->constrained('spells')->cascadeOnDelete();
            $table->foreignId('klass_id')->constrained('klasses')->cascadeOnDelete();
            $table->foreignId('sub_klass_id')->constrained('sub_klasses')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spell_klasses');
        Schema::dropIfExists('spells');
    }
};
