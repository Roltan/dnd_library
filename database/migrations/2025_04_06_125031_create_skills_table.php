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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klass_id')->constrained('klasses')->cascadeOnDelete();
            $table->foreignId('sub_klass_id')->nullable()->constrained('sub_klasses')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->integer('lvl');
            $table->string('script')->nullable();
            $table->boolean('set_price'); // ограничено ли применение способности
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
