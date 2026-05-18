<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'binapusaka98@gmail.com'],
            [
                'name'     => 'Admin BPMarine.co',
                'password' => Hash::make('BinaPusaka.98'),
            ]
        );
    }
}