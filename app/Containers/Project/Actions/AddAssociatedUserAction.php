<?php

namespace App\Containers\Project\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;

class AddAssociatedUserAction extends Action
{
    public function run(Request $request)
    {
        $project = Apiato::call('Project@FindProjectByIdTask', [$request->projectId]);
        $user = Apiato::call('User@FindUserByIdTask', [$request->userId]);

        $project->associatedUsers()->sync($user->id);

        return $user;
    }
}
