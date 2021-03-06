<?php

namespace App\Containers\Board\Tasks;

use App\Containers\Board\Data\Criterias\ProjectCriteria;
use App\Containers\Board\Data\Repositories\BoardRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllBoardsTask extends Task
{

    private $repository;

    public function __construct(BoardRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }

    public function project($projectId) {
        $this->repository->pushCriteria(new ProjectCriteria($projectId));
    }
}
