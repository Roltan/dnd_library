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
        // характеристики и под характеристики
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название
            $table->foreignId('parent_id')->nullable()->constrained('abilities')->cascadeOnDelete(); // ссылка на родительскую характеристику
        });

        // связь характеристики с классом
        Schema::create('klass_abilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ability_id')->constrained('abilities')->cascadeOnDelete();
            $table->foreignId('klass_id')->constrained('klass')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klass_abilities');
        Schema::dropIfExists('abilities');
    }
};
