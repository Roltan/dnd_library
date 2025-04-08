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
        Schema::create('feats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manual')->default('https://dnd.su/feats/');
            $table->string('source')->default("Player`s handbook");

            $table->json('condition')->nullable(); // необходимое условие

            $table->string('name_resource')->nullable(); // название расходника
            $table->integer('value_resource')->nullable(); // максимальный запас расходника
            $table->boolean('reset_short_rest')->default(false); // восстановится ли после короткого отдыха
            $table->boolean('reset_initiative')->default(false); // восстановится ли во время броска инициативы
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feats');
    }
};
