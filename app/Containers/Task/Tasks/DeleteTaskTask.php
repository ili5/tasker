<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Task\Data\Criterias\CheckIfUserCanDeleteCriteria;
use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteTaskTask extends Task
{

    private $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            /*
            * Task can be deleted by project owner or task creator
            */
//            $this->repository->pushCriteria(CheckIfUserCanDeleteCriteria::class);
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            dd($exception->getMessage());
            throw new DeleteResourceFailedException();
        }
    }
}
