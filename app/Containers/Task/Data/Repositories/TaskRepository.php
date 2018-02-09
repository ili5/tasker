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

//    public function orWhereHas($relation, $closure) {
//        $this->model = $this->model->orWhereHas($relation, $closure);
//        return $this;
//    }

}
