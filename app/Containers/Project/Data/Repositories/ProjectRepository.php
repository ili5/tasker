<?php

namespace App\Containers\Project\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProjectRepository
 */
class ProjectRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
