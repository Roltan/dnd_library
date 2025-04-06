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
            $table->bigInteger('caster_id')->unsigned();
            $table->string('table');
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
