<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCommentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Comment@DeleteCommentTask', [$request->id]);
    }
}
