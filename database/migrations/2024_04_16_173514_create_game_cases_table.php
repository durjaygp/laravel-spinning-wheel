<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_cases', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->longText('description')->nullable();
            $table->string('win_chance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_cases');
    }
};
