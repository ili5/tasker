<?php

namespace App\Containers\Task\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Task\Tasks\CreateTaskTask;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class TaskSeeder extends Seeder
{
    use WithFaker;

    public function run()
    {
        $this->setUpFaker();
        $projectIds = [1,2];
        $boardsIds = [
            1 => [
                1,3,5,7
            ],
            2 => [
                2,4,6,8
            ]
        ];


        foreach($projectIds as $projectId){
            for($i=0; $i < 5; $i++) {
                $boardId = array_random($boardsIds[$projectId]);
                $title = $this->faker->sentence;
                $description = $this->faker->text;
                if($projectId == 1){
                    $creatorId = 1;
                    $assignedId = 1;
                    Apiato::call(CreateTaskTask::class,[
                        [
                            'project_id' => $projectId,
                            'board_id'  =>  $boardId,
                            'creator_id'    =>  $creatorId,
                            'assigned_id'   =>  $assignedId,
                            'title' =>  $title,
                            'description'   =>  $description
                        ]
                    ]);
                } else {
                    $creatorId = rand(1,2);
                    $assignedId = rand(1,2);
                    Apiato::call(CreateTaskTask::class,[
                        [
                            'project_id' => $projectId,
                            'board_id'  =>  $boardId,
                            'creator_id'    =>  $creatorId,
                            'assigned_id'   =>  $assignedId,
                            'title' =>  $title,
                            'description'   =>  $description
                        ]
                    ]);
                }
            }

        }

    }
}
