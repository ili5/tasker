<?php

namespace App\Containers\Task\Tasks;

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
            return $this->repository->orWhereHas('project.user', function($q) {
                $q->where('id', request()->user()->id);
            })->orWhereHas('creator', function($q) {
                $q->where('id', request()->user()->id);
            })->orWhereHas('assigned', function($q) {
                $q->where('id', request()->user()->id);
            })->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
