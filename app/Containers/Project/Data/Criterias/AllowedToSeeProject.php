<?php
namespace App\Containers\Project\Data\Criterias;


use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class AllowedToSeeProject extends Criteria
{
    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where(function($query){
            $query->orWhereHas('associatedUsers', function($q){
                $q->where('user_id', request()->user()->id);
            })->orWhere('user_id', request()->user()->id);
        });
    }
}