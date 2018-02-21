<?php
namespace App\Containers\Task\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class CheckIfUserCanDeleteCriteria extends Criteria {

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where(function($query) {
            return $query->whereHas('project', function($q) {
                $q->where('user_id', request()->user()->id);
            })->orWhere('creator_id', request()->user()->id);
        });
    }
}