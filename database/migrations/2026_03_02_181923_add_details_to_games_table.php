<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // İncele (Accordion) paneli için detay metinleri (Boş bırakılabilir)
            $table->string('match_result_details')->nullable();     // Maç Sonucu
            $table->string('first_half_details')->nullable();       // İlk Yarı
            $table->string('goal_expectation_details')->nullable(); // Gol Beklentisi
            $table->string('btts_details')->nullable();             // Karşılıklı Gol
            $table->string('possible_scores_details')->nullable();  // Olası Skorlar
            $table->string('ht_ft_details')->nullable();            // İY/MS Kombinasyonu
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn([
                'match_result_details', 'first_half_details', 'goal_expectation_details',
                'btts_details', 'possible_scores_details', 'ht_ft_details'
            ]);
        });
    }
};
