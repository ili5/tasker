<?php
namespace App\Containers\Task\Data\Seeders;

use App\Containers\Project\Models\Project;
use App\Containers\Task\Models\Task;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class TaskSeeder_6 extends Seeder {
    use WithFaker;

    public function run()
    {
        $projects = Project::with(['boards', 'user', 'associatedUsers'])->get();
        foreach($projects as $project) {
            $owner = $project->user->toArray();
            $users = $project->associatedUsers->toArray();
            $users[] = $owner;

            foreach($project->boards as $board){
                for($i = 0; $i < rand(2,5); $i++) {
                    factory(Task::class)->create([
                        'project_id'    =>  $project->id,
                        'board_id'      =>  $board->id,
                        'creator_id'       =>  $users[rand(0, sizeof($users) - 1)]['id'],
                        'assigned_id'   =>  $users[rand(0, sizeof($users) - 1)]['id'],
                    ]);
                }

            }
        }
    }
}