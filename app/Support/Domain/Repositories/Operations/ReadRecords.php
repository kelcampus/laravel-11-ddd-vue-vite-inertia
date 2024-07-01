<?php

namespace App\Support\Domain\Repositories\Operations;

trait ReadRecords
{
    public function getAll($take = false, bool $paginate = false)
    {
        if ($paginate) {
            return $this->model::paginate($take);
        }

        if (!$paginate && $take > 0) {
            return $this->model::limit($take)->get();
        }

        if ($take > 0 || $take !== false) {
            return $this->model::paginate($take);
        }

        return $this->model::all();
    }

    public function findByID($id, bool $fail = true)
    {
        if ($fail) {
            return $this->model::findOrFail($id);
        }

        return $this->model::find($id);
    }
}
