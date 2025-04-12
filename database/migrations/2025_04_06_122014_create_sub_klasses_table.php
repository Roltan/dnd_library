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
        // под класс
        Schema::create('sub_klasses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('klass_id')->constrained('klasses')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_klasses');
    }
};
