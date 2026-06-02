<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'premium_ends_at',
        'fcm_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'premium_ends_at' => 'datetime',
    ];

    public function favoriteGames(): BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_user');
    }

    public function hasActivePremium(): bool
    {
        return $this->premium_ends_at && $this->premium_ends_at->isFuture();
    }
    public function games()
    {
        return $this->belongsToMany(Game::class)->withTimestamps();
    }
}
