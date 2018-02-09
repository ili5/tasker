<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Task\Data\Criterias\CheckIfUserCanUpdateCriteria;
use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateTaskTask extends Task
{

    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            /*
             * Task can be modified by project owner, task creator or task assigned user
             */
            $this->repository->pushCriteria(CheckIfUserCanUpdateCriteria::class);
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            dd($exception->getMessage());
            throw new UpdateResourceFailedException();
        }
    }
}
