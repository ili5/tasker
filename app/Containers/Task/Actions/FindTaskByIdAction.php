<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTaskByIdAction extends Action
{
    public function run(Request $request)
    {
        $task = Apiato::call('Task@FindTaskByIdTask', [$request->id]);

        return $task;
    }
}
