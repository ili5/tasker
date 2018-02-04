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
        'Planning',
        'In Progress',
        'Testing',
        'Done'
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
        foreach(self::DefaultBoards as $boardName) {
            $data = [
                'name'  =>  $boardName,
                'project_id'    =>  $project->id
            ];
            Apiato::call(CreateBoardTask::class, [$data]);
        }
    }
}
