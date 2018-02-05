<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateTaskAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'title',
            'description',
            'board_id',
            'assigned_id',
            'due_date'
        ]);

        $task = Apiato::call('Task@UpdateTaskTask', [$request->id, $data]);

        return $task;
    }
}
