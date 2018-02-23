<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Board\Models\Board;
use App\Containers\Board\Tasks\CreateBoardTask;
use App\Containers\Message\Models\Message;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Tasks\CreateProjectTask;
use App\Containers\Task\Models\Task;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class ProjectSeeder_4 extends Seeder
{
    use WithFaker;

    public function run()
    {
        $this->setUpFaker();

        $usersNumber = 5;
        for ($i = 1; $i <= $usersNumber; $i++){
            factory(Project::class, 3)->create([
                'user_id'   =>  $i
            ])->each(function($project) use ($i) {
                // Add associated users on each project
                $associatedUsers = [];
                for($j = 1; $j < 10; $j++) {
                    $userId = rand(1,5);
                    if($userId != $i){
                        $associatedUsers[] = $userId;
                        $project->associatedUsers()->syncWithoutDetaching([$userId]);
                    }
                }
            });
        }
    }
}
