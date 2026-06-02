<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('teams');
            $table->dateTime('match_time');
            $table->integer('iy_05_ust_percent')->nullable();
            $table->integer('combo_probability_percent')->nullable();
            $table->boolean('iy_05_ust_result')->nullable();
            $table->boolean('ms_15_ust_result')->nullable();
            $table->enum('status', ['pending', 'started', 'finished'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};