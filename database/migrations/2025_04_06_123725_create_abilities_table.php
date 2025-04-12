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
        // характеристики и под характеристики
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // название
            $table->foreignId('parent_id')->nullable()->constrained('abilities')->cascadeOnDelete(); // ссылка на родительскую характеристику
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abilities');
    }
};
