<?php

namespace App\Containers\Board\UI\API\Transformers;

use App\Containers\Board\Models\Board;
use App\Ship\Parents\Transformers\Transformer;

class BoardTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Board $entity
     *
     * @return array
     */
    public function transform(Board $entity)
    {
        $response = [
            'object' => 'Board',
            'id' => $entity->getHashedKey(),
            'name'  =>  $entity->name,
            'color' =>  $entity->color,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        return $response;
    }
}
