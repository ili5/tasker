<?php

namespace App\Containers\Comment\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCommentByIdAction extends Action
{
    public function run(Request $request)
    {
        $comment = Apiato::call('Comment@FindCommentByIdTask', [$request->id]);

        return $comment;
    }
}
