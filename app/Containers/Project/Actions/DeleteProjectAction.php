<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteProjectAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Project@DeleteProjectTask', [$request->id]);
    }
}
