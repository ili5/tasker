<?php
namespace App\Containers\Project\Tests\Unit\Tests;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Containers\User\Models\User;

class UpdateProjectTest extends TestCase{

    protected $endpoint = 'patch@v1/projects/{id}';

    /**
     * You can update only your own projects
     */
    function testUpdateOwnedProject()
    {
        $user = $this->getTestingUser();
        $project = factory(Project::class)->create([
            'user_id'   =>  $user->id
        ]);

        $data = [
            'name'  =>  'updated project name'
        ];

        $response = $this->injectId($project->id)->makeCall($data);

        $response->assertStatus(200);

        $this->assertResponseContainKeyValue([
            'name'  =>  $data['name']
        ]);
    }

    /**
     * You can't update
     */
    function testUpdateAssociatedProject()
    {
        $projectOwner = factory(User::class)->create();
        $project = factory(Project::class)->create([
            'user_id'   =>  $projectOwner->id
        ]);

        $data = [
            'name'  =>  'updated project name'
        ];

        $response = $this->injectId($project->id)->makeCall($data);

        $response->assertStatus(417);

        $this->assertResponseContainKeyValue([
            'message'   =>  'Failed to update Resource.'
        ]);
    }
}