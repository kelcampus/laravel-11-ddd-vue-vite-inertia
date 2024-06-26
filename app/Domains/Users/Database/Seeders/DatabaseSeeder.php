<?php

namespace App\Domains\Users\Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            \App\Domains\Users\Database\Seeders\UserSeeder::class,
        ]);
    }
}
