<?php

namespace App\Containers\Board\Data\Seeders;

use App\Containers\Board\Models\Board;
use App\Containers\Project\Models\Project;
use App\Ship\Parents\Seeders\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class BoardSeeder_5 extends Seeder {
    use WithFaker;

    const DefaultBoards = [
        'Planning' => 'bg-info',
        'In Progress' => 'bg-primary',
        'Testing' => 'bg-warning',
        'Done' => 'bg-success'
    ];

    public function run()
    {
        $projects = Project::all();
        foreach($projects as $project) {
            foreach(self::DefaultBoards as $boardName => $boardColor){
                factory(Board::class)->create([
                    'project_id'    =>  $project->id,
                    'name'  =>  $boardName,
                    'color' =>  $boardColor
                ]);
            }
        }
    }
}