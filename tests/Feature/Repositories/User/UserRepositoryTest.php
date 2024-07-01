<?php

namespace Tests\Feature\Repositories\User;

use Tests\TestCase;
use App\Domains\Users\Contracts\UserRepository;
use App\Domains\Users\Database\Seeders\UserSeeder;
use App\Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_repository_can_create_a_user(): void
    {
        $user = User::factory()->make()->makeVisible(['password', 'remember_token']);

        $userRepository = app(UserRepository::class);

        $userSaved = $userRepository->create($user->toArray());

        $this->assertModelExists($userSaved);
    }

    public function test_user_repository_can_save_a_model_user(): void
    {
        $user = User::factory()->make()->makeVisible(['password', 'remember_token']);

        $userRepository = app(UserRepository::class);

        $status = $userRepository->save($user);

        $this->assertTrue($status);

        $this->assertModelExists($user);
    }

    public function test_user_repository_can_update_a_user(): void
    {
        $user = User::factory()->create();

        $userRepository = app(UserRepository::class);

        $newEmail = 'emailchanged@test.com';
        $status = $userRepository->update($user->id, ['email' => $newEmail]);

        $this->assertTrue($status);

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'email' => $newEmail,
        ]);
    }

    public function test_user_repository_can_list_all_users_without_pagination(): void
    {
        $this->seed(UserSeeder::class);

        $userRepository = app(UserRepository::class);

        $users = $userRepository->getAll();

        $this->assertCount(2, $users);
    }

    public function test_user_repository_can_list_users_with_pagination(): void
    {
        User::factory()->count(20)->create();

        $userRepository = app(UserRepository::class);

        $take = 10;
        $users = $userRepository->getAll(take: $take, paginate: true);

        $this->assertCount(10, $users);
    }

    public function test_user_repository_can_list_first_users_only(): void
    {
        User::factory()->count(20)->create();

        $userRepository = app(UserRepository::class);

        $take = 5;
        $users = $userRepository->getAll(take: $take);

        $this->assertCount(5, $users);
    }

    public function test_user_repository_can_read_a_user_by_id(): void
    {
        $this->seed(UserSeeder::class);

        $userRepository = app(UserRepository::class);

        $user = $userRepository->findByID(id: 1);

        $this->assertNotNull($user);
    }

    public function test_user_repository_user_not_found_by_id_fail_is_false(): void
    {
        $this->seed(UserSeeder::class);

        $userRepository = app(UserRepository::class);

        $user = $userRepository->findByID(id: 999, fail: false);

        $this->assertNull($user);
    }

    public function test_user_repository_user_not_found_by_id_fail_is_true(): void
    {
        $this->seed(UserSeeder::class);

        $userRepository = app(UserRepository::class);

        $this->expectException(\Illuminate\Database\Eloquent\ModelNotFoundException::class);
        $this->expectExceptionMessage('No query results for model');

        $userRepository->findByID(id: 999);

    }

    public function test_user_repository_can_delete_a_user_by_id(): void
    {
        $this->seed(UserSeeder::class);

        $userRepository = app(UserRepository::class);

        $user = $userRepository->getAll()->first();

        $status = $userRepository->delete(id: $user->id);

        $this->assertTrue($status);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseMissing('users', [
            'email' => $user->email,
        ]);
    }
}
