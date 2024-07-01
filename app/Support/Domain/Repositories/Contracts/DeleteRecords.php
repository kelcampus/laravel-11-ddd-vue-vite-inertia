<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface DeleteRecords.
 */
interface DeleteRecords
{
    /**
     * Run the delete command model.
     * The goal is to enable the implementation of your business logic before the command.
     *
     * @param \Illuminate\Database\Eloquent\Model
     *
     * @return bool
     */
    public function delete($model);
}
