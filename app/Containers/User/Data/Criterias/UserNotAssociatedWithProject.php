<?php

namespace App\Containers\User\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class UserNotAssociatedWithProject extends Criteria
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->whereDoesntHave('projects', function ($q) {
            $q->where('id', $this->projectId);
        })->whereDoesntHave('associatedProjects', function ($q) {
            $q->where('project_id', $this->projectId);
        });
    }

}