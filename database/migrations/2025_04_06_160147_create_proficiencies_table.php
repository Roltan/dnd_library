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
        Schema::create('proficiencies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
        });

        Schema::create('klass_proficiencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klass_id')->constrained('klasses')->cascadeOnDelete();
            $table->foreignId('proficiency_id')->constrained('proficiencies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klass_proficiencies');
        Schema::dropIfExists('proficiencies');
    }
};
