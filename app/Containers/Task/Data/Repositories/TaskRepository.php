<?php

namespace App\Containers\Task\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class TaskRepository
 */
class TaskRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
