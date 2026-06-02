<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('games')->insert([
            [
                'teams' => 'Galatasaray - Fenerbahçe',
                'match_time' => Carbon::now()->addHours(3),
                'iy_05_ust_percent' => 85,
                'combo_probability_percent' => 75,
                'iy_05_ust_result' => null,
                'ms_15_ust_result' => null,
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'teams' => 'Real Madrid - Barcelona',
                'match_time' => Carbon::now()->addDays(1),
                'iy_05_ust_percent' => 92,
                'combo_probability_percent' => 88,
                'iy_05_ust_result' => null,
                'ms_15_ust_result' => null,
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'teams' => 'Manchester City - Bayern Munich',
                'match_time' => Carbon::now()->subHours(2),
                'iy_05_ust_percent' => 78,
                'combo_probability_percent' => 65,
                'iy_05_ust_result' => 1,
                'ms_15_ust_result' => 1,
                'status' => 'finished',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
