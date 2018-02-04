<?php

namespace App\Containers\Board\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Board\Tasks\CreateBoardTask;
use App\Containers\Project\Actions\CreateProjectAction;
use App\Ship\Parents\Seeders\Seeder;

class BoardSeeder extends Seeder
{
    public function run()
    {
        foreach(CreateProjectAction::DefaultBoards as $boardName){
            Apiato::call(CreateBoardTask::class, [
                [
                    'name'  =>  $boardName,
                    'project_id'    =>  1
                ]
            ]);
            Apiato::call(CreateBoardTask::class, [
                [
                    'name'  =>  $boardName,
                    'project_id'    =>  2
                ]
            ]);
        }
    }
}
