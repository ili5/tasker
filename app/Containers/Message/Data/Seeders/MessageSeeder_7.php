<?php
namespace App\Containers\Message\Data\Seeders;

use App\Containers\Message\Models\Message;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Seeders\Seeder;

class MessageSeeder_7 extends Seeder {
    public function run()
    {
        $projects = Project::with(['user','associatedUsers','tasks'])->get();

        foreach($projects as $project) {
            $users = $project->associatedUsers->toArray();
            $users[] = $project->user->toArray();
            $usersNum = sizeof($users)-1;
            foreach($project->tasks as $task) {
                for($i = 0; $i < 3; $i++) {
                    factory(Message::class)->create([
                        'task_id'   =>  $task->id,
                        'user_id'   =>  $users[rand(0, $usersNum)]['id']
                    ]);
                }

            }
        }
    }
}