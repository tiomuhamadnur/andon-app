<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Tio Muhamad Nur',
            'email' => 'tiomuhamadnur@gmail.com',
            'password' => ('user123')
        ]);
    }
}