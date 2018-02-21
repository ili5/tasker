<?php

namespace App\Containers\Message\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class MessageRepository
 */
class MessageRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
