<?php

namespace App\Support\Domain\Repositories\Operations;

trait UpdateRecords
{
    public function update($id, array $data = []): bool
    {
        return $this->model::whereId($id)->update($data);
    }
}
