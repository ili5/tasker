<?php

namespace App\Containers\Message\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Auth;

class CreateMessageAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'task_id',
            'message'
        ]);

        $data['user_id'] = Auth::user()->id;

        $message = Apiato::call('Message@CreateMessageTask', [$data]);

        return $message;
    }
}
