<?php

namespace App\Containers\Task\UI\API\Transformers;

use App\Containers\Task\Models\Task;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class TaskTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'creator', 'assigned'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Task $entity
     *
     * @return array
     */
    public function transform(Task $entity)
    {
        $response = [
            'object' => 'Task',
            'id' => $entity->getHashedKey(),
            'board' =>  $entity->board->getHashedKey(),
            'title' =>  $entity->title,
            'description'   =>  $entity->description,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,
        ];

        return $response;
    }

    public function includeCreator(Task $task)
    {
        return $this->item($task->creator, new UserTransformer());
    }

    public function includeAssigned(Task $task)
    {
        return $this->item($task->assigned, new UserTransformer());
    }
}
