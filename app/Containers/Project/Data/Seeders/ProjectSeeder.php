<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Tasks\CreateProjectTask;
use App\Ship\Parents\Seeders\Seeder;

class ProjectSeeder extends Seeder
{


    public function run()
    {
        $projectOne = [
            'name'  =>  'Test Project',
            'description'   =>  'Test Project description',
            'user_id'   =>  1
        ];

        Apiato::call(CreateProjectTask::class, [$projectOne]);

        $projectTwo = [
            'name'  =>  'Other Project',
            'description'   =>  'Other project description',
            'user_id'   =>  2
        ];

        $projectTwo = Apiato::call(CreateProjectTask::class, [$projectTwo]);
        $projectTwo->associatedUsers()->syncWithoutDetaching([1]);
    }
}
