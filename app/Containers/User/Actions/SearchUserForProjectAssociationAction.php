<?php

namespace App\Containers\User\Actions;

use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;

class SearchUserForProjectAssociationAction extends Action
{
    public function run(Request $request)
    {

        $criterias = [
            'searchForProjectAssociation'   =>  [
                $request->projectId,
                $request->get('query')]
        ];

        $users = Apiato::call('User@GetAllUsersTask', [], [$criterias]);

        return $users;
    }
}
