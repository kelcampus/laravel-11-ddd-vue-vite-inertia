<?php

namespace App\Domains\Users\Repositories;

use App\Domains\Users\Contracts\UserRepository as UserRepositoryContract;
use App\Domains\Users\Models\User;
use App\Support\Domain\Repositories\CrudRepository;

class UserRepository extends CrudRepository implements UserRepositoryContract
{
    protected $model = User::class;
}
