<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTaskAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Task@DeleteTaskTask', [$request->id]);
    }
}
