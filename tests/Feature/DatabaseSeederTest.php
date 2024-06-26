<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domains\Users\Database\Seeders\DatabaseSeeder;

class DatabaseSeederTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_database_seeder_is_working(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->assertDatabaseCount('users', 2);
    }
}
