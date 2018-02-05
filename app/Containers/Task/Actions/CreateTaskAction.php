<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTaskAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'project_id',
            'board_id',
            'assigned_id',
            'title',
            'description',
            'due_date'
        ]);

        $data['creator_id'] = request()->user()->id;

        $task = Apiato::call('Task@CreateTaskTask', [$data]);

        return $task;
    }
}
