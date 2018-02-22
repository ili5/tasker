<?php

namespace App\Containers\Message\Tasks;

use App\Containers\Message\Data\Criterias\SelectByTaskCriteria;
use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Ship\Parents\Exceptions\Exception;
use App\Ship\Parents\Tasks\Task;
use Symfony\Component\Translation\Exception\InvalidResourceException;

class GetAllMessagesTask extends Task
{

    private $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        try {
            return $this->repository->get();
        }catch (Exception $exception) {
            dd($exception->getMessage());
            throw new InvalidResourceException();
        }

    }

    public function task($taskId)
    {
        $this->repository->pushCriteria(new SelectByTaskCriteria($taskId));
    }
}
