<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Equipe TrocaTeca',
            'email' => 'trocatecaltda@gmail.com',
            'email_verified_at' => '2024-08-23 02:41:39',
            'password' => '$2y$12$PjhCrVD5iaJa0tvjKVXjOeCsB7yqjy.Qa4oO.AsGYfr0Q6goLHjly',
        ]);
        \App\Models\User::factory()->count(2)->create();
    }
    
    
}
