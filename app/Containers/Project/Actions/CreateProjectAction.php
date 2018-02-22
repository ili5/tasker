<?php

namespace App\Containers\Project\Actions;

use App\Containers\Board\Tasks\CreateBoardTask;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Auth;

class CreateProjectAction extends Action
{
    const DefaultBoards = [
        'Planning' => 'bg-info',
        'In Progress' => 'bg-primary',
        'Testing' => 'bg-warning',
        'Done' => 'bg-success'
    ];

    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'description'
        ]);

        $data['user_id']   =  Auth::user()->id;

        $project = Apiato::call('Project@CreateProjectTask', [$data]);

        $this->createDefaultBoards($project);

        return $project;
    }

    protected function createDefaultBoards(Project $project)
    {
        foreach(self::DefaultBoards as $boardName => $boardColor) {
            $data = [
                'name'  =>  $boardName,
                'project_id'    =>  $project->id,
                'color' =>  $boardColor
            ];
            Apiato::call(CreateBoardTask::class, [$data]);
        }
    }
}
