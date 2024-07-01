<?php

namespace App\Support\Domain\Repositories;

use App\Support\Domain\Repositories\Contracts\ReadRecords as ReadRecordsContract;
use App\Support\Domain\Repositories\Operations\ReadRecords;

abstract class ReadRepository extends Repository implements ReadRecordsContract
{
    use ReadRecords;
}
