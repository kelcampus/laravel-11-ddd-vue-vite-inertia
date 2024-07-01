<?php

namespace App\Support\Domain\Repositories\Operations;

trait CreateRecords
{
    public function save($model): bool
    {
        return $model->save();
    }

    public function create(array $data = [])
    {
        return $this->model::create($data);
    }

}
