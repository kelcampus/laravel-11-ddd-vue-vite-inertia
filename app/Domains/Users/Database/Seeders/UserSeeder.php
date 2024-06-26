<?php

namespace App\Domains\Users\Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Domains\Users\Models\User::factory(2)->create();
    }
}
