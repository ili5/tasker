<?php

namespace App\Containers\User\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class SearchUsersForProjectAssociationCriteria extends Criteria
{
    protected $query;
    protected $projectId;

    public function __construct($query, $projectId)
    {
        $this->query = $query;
        $this->projectId = $projectId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where(function($q) {
            return $q->where('email', 'like', '%'.$this->query.'%')
                ->orWhere('name', 'like', '%'.$this->query.'%');
        })->whereDoesntHave('projects', function ($q) {
            $q->where('id', $this->projectId);
        })->whereDoesntHave('associatedProjects', function ($q) {
            $q->where('project_id', $this->projectId);
        });
    }

}