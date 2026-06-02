<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'omer.utgur@gmail.com'], // Bu e-postayı arar
            [
                'name' => 'Ömer Utgur', // İsim soyisim
                'password' => Hash::make('12345678'), // İstediğiniz bir şifre belirleyin
                'is_admin' => 1, // Yönetici yetkisi
            ]
        );
    }
}
