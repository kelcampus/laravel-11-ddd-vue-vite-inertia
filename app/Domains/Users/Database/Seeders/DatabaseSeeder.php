<?php

namespace App\Domains\Users\Database\Seeders;


use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * php artisan db:seed --class="\App\Domains\Users\Database\Seeders\DatabaseSeeder"
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
    }
}
