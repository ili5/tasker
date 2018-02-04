<?php
namespace App\Containers\Board\Data\Criterias;


use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class ProjectCriteria extends Criteria
{
    protected $projectId;

    public function __construct($projectId)
    {
        $this->projectId = $projectId;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('project_id', $this->projectId);
    }
}