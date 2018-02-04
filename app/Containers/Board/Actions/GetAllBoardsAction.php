<?php

namespace App\Containers\Board\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllBoardsAction extends Action
{
    public function run(Request $request)
    {
        $criterias = [
            'project'   =>  [$request->project_id]
        ];
        $boards = Apiato::call('Board@GetAllBoardsTask', [], [$criterias]);
        return $boards;
    }
}
