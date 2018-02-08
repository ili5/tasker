<?php
namespace App\Containers\Project\Data\Criterias;


use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class OrderByCreationDateCriteria extends Criteria
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->orderBy('created_at', 'desc');
    }
}