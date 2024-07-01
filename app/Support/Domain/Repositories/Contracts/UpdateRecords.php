<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface UpdateRecords.
 */
interface UpdateRecords
{
    /**
     * Updated model data, using $data
     * The sequence performs the Model update.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array $data
     */
    public function update($model, array $data = []):bool ;
}
