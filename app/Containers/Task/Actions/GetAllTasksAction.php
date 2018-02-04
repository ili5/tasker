<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTasksAction extends Action
{
    public function run(Request $request)
    {
        $tasks = Apiato::call('Task@GetAllTasksTask');

        return $tasks;
    }
}
