<?php

namespace App\Support\Domain\Repositories\Operations;

trait DeleteRecords
{
    public function delete($id): bool
    {
        return $this->model::destroy($id);
    }
}
