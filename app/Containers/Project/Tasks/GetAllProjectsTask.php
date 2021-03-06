<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Data\Criterias\MyOwnWithAssociatedProjects;
use App\Ship\Criterias\Eloquent\OrderByCreationDateDescendingCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllProjectsTask extends Task
{

    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        $this->repository->pushCriteria(MyOwnWithAssociatedProjects::class);
        $this->repository->pushCriteria(OrderByCreationDateDescendingCriteria::class);
        return $this->repository->get();
    }
}
