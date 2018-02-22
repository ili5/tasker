<?php

namespace App\Containers\Message\UI\API\Transformers;

use App\Containers\Message\Models\Message;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;

class MessageTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [
        'user'
    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param Message $entity
     *
     * @return array
     */
    public function transform(Message $entity)
    {
        $response = [
            'object' => 'Message',
            'id' => $entity->getHashedKey(),
            'owner' =>  ($entity->user->id == request()->user()->id) ? true : false,
            'message'   =>  $entity->message,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        return $response;
    }

    public function includeUser(Message $message)
    {
        return $this->item($message->user, new UserTransformer());
    }
}
