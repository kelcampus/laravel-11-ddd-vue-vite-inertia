<?php

namespace App\Support\Domain\Repositories;

abstract class Repository
{
    /**
     * Model class for repo.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model|TModel>
     */
    protected $model;
}
