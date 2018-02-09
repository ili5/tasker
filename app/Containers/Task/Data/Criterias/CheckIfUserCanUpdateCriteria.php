<?php
namespace App\Containers\Task\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class CheckIfUserCanUpdateCriteria extends Criteria {

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->whereHas('project.user', function($q) {
            $q->where('id', request()->user()->id);
        })->orWhereHas('creator', function($q) {
            $q->where('id', request()->user()->id);
        })->orWhereHas('assigned', function($q) {
            $q->where('id', request()->user()->id);
        });
    }
}