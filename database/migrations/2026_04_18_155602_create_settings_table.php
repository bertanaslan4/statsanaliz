<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // Sayacın çalışması için sayısal (integer) değerler kullanıyoruz
            $table->integer('analyzed_matches')->default(1250);
            $table->integer('success_rate')->default(85);
            $table->string('live_notification')->default('24');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
