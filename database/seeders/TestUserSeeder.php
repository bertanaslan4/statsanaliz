<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'bertanaslan4@hotmail.com'], // Bu e-postayı arar
            [
                'name' => 'Bertan Aslan', // İsim
                'password' => Hash::make('12345678'), // Şifre
                'is_admin' => 1, // Admin yetkisi
            ]
        );
    }
}
