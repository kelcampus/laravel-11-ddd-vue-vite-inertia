<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface CreateRecords.
 */
interface CreateRecords
{
    /**
     * Creates a Model object with the $data information.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data = []);

    /**
     * Performs the save method of the model
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return bool
     */
    public function save($model);
}
