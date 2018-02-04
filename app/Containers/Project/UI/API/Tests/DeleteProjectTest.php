<?php
namespace App\Containers\Project\UI\API\Tests;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Containers\User\Models\User;

class DeleteProjectTest extends TestCase {

    protected $endpoint = 'delete@v1/projects/{id}';

    function testDeleteOwnedProject()
    {
        $user = $this->getTestingUser();
        $project = factory(Project::class)->create([
            'user_id'   =>  $user->id
        ]);

        $response = $this->injectId($project->id)->makeCall();

        $response->assertStatus(204);
    }

    function testDeleteNotOwnedProject()
    {
        $project = factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()
        ]);

        $response = $this->injectId($project->id)->makeCall();

        // User
        $response->assertStatus(417);
    }
}