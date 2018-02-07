<?php

namespace App\Containers\User\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class FindUserByEmailOrNameCriteria extends Criteria
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('email', 'like', '%'.$this->query.'%')
            ->orWhere('name', 'like', '%'.$this->query.'%');
    }

}