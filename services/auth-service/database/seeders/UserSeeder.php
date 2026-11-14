<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gouv.tg'],
            [
                'name' => 'Koffi Mensah',
                'password' => Hash::make('password'),
            ]
        );
    }
}