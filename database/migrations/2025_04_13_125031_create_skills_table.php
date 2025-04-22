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
            $table->longText('description'); // текстовое описание действия
            $table->integer('lvl')->default(1); // уровень получения способности
            $table->string('script')->nullable(); // путь до файла со скриптом выполнения
            $table->boolean('set_price')->default(0); // ограничено ли применение способности

            //            $table->foreign('caster_id', 'fk_skill_klass')->references('id')->on('klasses')->cascadeOnDelete();
            //            $table->foreign('caster_id', 'fk_skill_sub_klass')->references('id')->on('sub_klasses')->cascadeOnDelete();
            //            $table->foreign('caster_id', 'fk_skill_race')->references('id')->on('races')->cascadeOnDelete();
            //            $table->foreign('caster_id', 'fk_skill_sub_race')->references('id')->on('sub_races')->cascadeOnDelete();
            //            $table->foreign('caster_id', 'fk_skill_feat')->references('id')->on('feats')->cascadeOnDelete();
            //            $table->foreign('caster_id', 'fk_skill_background')->references('id')->on('backgrounds')->cascadeOnDelete();
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
