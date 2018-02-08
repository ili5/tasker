<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Board\Models\Board;
use App\Containers\Board\Tasks\CreateBoardTask;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Tasks\CreateProjectTask;
use App\Containers\Task\Models\Task;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class ProjectSeeder extends Seeder
{
    use WithFaker;

    const DefaultBoards = [
        'Planning',
        'In Progress',
        'Testing',
        'Done'
    ];

    public function run()
    {
        $this->setUpFaker();

        $usersNumber = 52;
        for ($i = 1; $i <= $usersNumber; $i++){
            factory(Project::class, rand(5,10))->create([
                'user_id'   =>  $i
            ])->each(function($project) use ($i) {
                // Add boards for each project
                $boards = [];
                foreach(self::DefaultBoards as $boardName){
                    $boards[] = factory(Board::class)->create([
                        'name'  =>  $boardName,
                        'project_id'    =>  $project->id
                    ]);
                }

                // Add associated users on each project
                $associatedUsers = [];
                for($j = 1; $j < rand(3,10); $j++) {
                    $userId = rand(1,52);
                    $associatedUsers[] = $userId;
                    if($userId != $i){
                        $project->associatedUsers()->syncWithoutDetaching([$userId]);
                    }
                }
                $associatedUsers[] = $i;

                // Add tasks to project
                for($k = 0; $k < rand(30,60); $k++) {
                    factory(Task::class)->create([
                        'project_id'    =>  $project->id,
                        'board_id'  =>  $boards[rand(0,3)]->id,
                        'creator_id'    =>  $associatedUsers[rand(0,sizeof($associatedUsers)-1)],
                        'assigned_id'   =>  $associatedUsers[rand(0,sizeof($associatedUsers)-1)]
                    ]);
                }

            });
        }
    }
}
