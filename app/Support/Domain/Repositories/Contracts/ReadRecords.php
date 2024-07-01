<?php

namespace App\Support\Domain\Repositories\Contracts;

/**
 * Interface ReadRecords.
 */
interface ReadRecords
{
    /**
     * Returns all records.
     * If take !== false returns Paginator instance.
     * If $paginate is true returns Paginator instance.
     *
     * @param mixed $take
     * @param bool  $paginate
     *
     * @return \Illuminate\Support\Collection|\Illuminate\Pagination\AbstractPaginator
     */
    public function getAll($take = false, bool $paginate = false);

    /**
     * Retrieves a record by his id
     * If fail is true $ fires ModelNotFoundException.
     *
     * @param int  $id
     * @param bool $fail
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByID($id, bool $fail = true);
}
