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
        // ресурсы класса (ци, ячейки)
        Schema::create('klass_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klass_id')->constrained('klasses')->CascadeOnDelete();
            $table->foreignId('sub_klass_id')->nullable()->constrained('sub_klasses')->CascadeOnDelete();
            $table->string('name'); // название
            $table->integer('lvl'); // уровень класса
            $table->integer('value'); // максимальный запас
            $table->boolean('is_resources'); // расходный ресурс или лимит
            $table->boolean('reset_short_rest')->default(false); // восстановится ли после короткого отдыха
            $table->boolean('reset_initiative')->default(false); // восстановится ли во время броска инициативы
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klass_units');
    }
};
