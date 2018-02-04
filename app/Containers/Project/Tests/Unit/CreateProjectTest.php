<?php
namespace App\Containers\Project\Tests\Unit;

use App\Containers\Board\Models\Board;
use App\Containers\Project\Actions\CreateProjectAction;
use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Containers\Project\UI\API\Requests\CreateProjectRequest;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\App;

class CreateProjectTest extends TestCase {

    public function testCreateProject_()
    {
        $this->getTestingUser();
        $data = [
            'name'  =>  'Project name',
            'description'   =>  'Project description'
        ];

        $request = new CreateProjectRequest($data);
        $action = App::make(CreateProjectAction::class);
        $project = $action->run($request);

        $this->assertInstanceOf(Project::class, $project);
        $this->assertInstanceOf(User::class, $project->user);
        $this->assertContainsOnlyInstancesOf(Board::class, $project->boards);

        $this->assertEquals($project->name, $data['name']);

    }

}