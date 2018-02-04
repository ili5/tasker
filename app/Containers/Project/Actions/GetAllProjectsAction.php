<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllProjectsAction extends Action
{
    public function run(Request $request)
    {
        $projects = Apiato::call('Project@GetAllProjectsTask', [], ['associatedProjects']);

        return $projects;
    }
}
