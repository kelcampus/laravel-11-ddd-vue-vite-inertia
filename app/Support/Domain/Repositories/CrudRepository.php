<?php

namespace App\Support\Domain\Repositories;

use App\Support\Domain\Repositories\Contracts\CreateRecords as CreateRecordsContract;
use App\Support\Domain\Repositories\Operations\CreateRecords;
use App\Support\Domain\Repositories\Contracts\UpdateRecords as UpdateRecordsContract;
use App\Support\Domain\Repositories\Operations\UpdateRecords;
use App\Support\Domain\Repositories\Contracts\ReadRecords as ReadRecordsContract;
use App\Support\Domain\Repositories\Operations\ReadRecords;
use App\Support\Domain\Repositories\Contracts\DeleteRecords as DeleteRecordsContract;
use App\Support\Domain\Repositories\Operations\DeleteRecords;

abstract class CrudRepository extends Repository implements CreateRecordsContract,
                                                            ReadRecordsContract,
                                                            UpdateRecordsContract,
                                                            DeleteRecordsContract

{
    use CreateRecords;
    use UpdateRecords;
    use ReadRecords;
    use DeleteRecords;
}
