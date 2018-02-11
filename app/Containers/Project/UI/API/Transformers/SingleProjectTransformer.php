<?php

namespace App\Containers\Project\UI\API\Transformers;

use App\Containers\Board\UI\API\Transformers\BoardTransformer;
use App\Containers\Project\Models\Project;
use App\Containers\Task\UI\API\Transformers\TaskTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class SingleProjectTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'user', 'boards', 'tasks', 'associatedUsers'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Project $entity
     *
     * @return array
     */
    public function transform(Project $entity)
    {
        $response = [
            'object' => 'Project',
            'id' => $entity->getHashedKey(),
            'name'  =>  $entity->name,
            'description'   =>  $entity->description,
            'owner' =>  ($entity->user->id == Auth()->user()->id) ? true : false,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];
        return $response;
    }

    public function includeUser(Project $entity)
    {
        return $this->item($entity->user, new UserTransformer());
    }

    public function includeBoards(Project $entity)
    {
        return $this->collection($entity->boards, new BoardTransformer());
    }

    public function includeTasks(Project $entity)
    {
        return $this->collection($entity->tasks, new TaskTransformer());
    }

    public function includeAssociatedUsers(Project $entity)
    {
        return $this->collection($entity->associatedUsers, new UserTransformer());
    }
}
