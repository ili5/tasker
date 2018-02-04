<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProjectTask extends Task
{

    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->whereHas('user', function($q) {
                $q->where('id', request()->user()->id);
            })->update($data, $id);

        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
