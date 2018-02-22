<?php
namespace App\Containers\Message\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface;

class SelectByTaskCriteria extends Criteria {

    protected $taskId;
    function __construct($taskId)
    {
        $this->taskId = $taskId;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        return $model->where('task_id', $this->taskId);
    }
}