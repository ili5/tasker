<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCommentsAction extends Action
{
    public function run(Request $request)
    {
        $comments = Apiato::call('Comment@GetAllCommentsTask');

        return $comments;
    }
}
