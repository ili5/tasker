<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Data\Criterias\WithAssociateProjects;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateProjectTask extends Task
{

    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            dd($exception->getMessage());
            throw new CreateResourceFailedException();
        }
    }

}
