<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameUser extends Pivot
{
    protected $table = 'game_user';
}