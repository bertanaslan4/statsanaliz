<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'teams',
        'match_time',
        'iy_05_ust_percent',
        'combo_probability_percent',
        'iy_05_ust_result',
        'ms_15_ust_result',
        'status'
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot('comment', 'is_successful')->withTimestamps();
    }
}
