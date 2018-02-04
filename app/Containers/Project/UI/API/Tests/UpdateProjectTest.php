<?php
namespace App\Containers\Project\UI\API\Tests;

use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Config;

class UpdateProjectTest extends TestCase {

    protected $endpoint = 'patch@/v1/projects/{id}';

    function testUpdateProject()
    {
        $user = $this->getTestingUser();
        $project = factory(Project::class)->create([
            'user_id'   =>  $user->id
        ]);

        $data = [
            'name'  =>  'Updated Project'
        ];

        $response = $this->injectId($project->id)->makeCall($data);

        $response->assertStatus(200);

        $responseObject = $this->getResponseContentObject();

        $this->assertEquals($data['name'], $responseObject->data->name);
    }

    function testUpdateProjectWithoutAuthorization()
    {
        $response = $this->json('patch', Config::get('apiato.api.url') . '/v1/projects/1', []);
        $response->assertStatus(401);
    }

    function testUpdateNotOwnedProject()
    {
        $project = factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()->id
        ]);

        $data = [
            'name'  =>  'Updated project'
        ];

        $response = $this->injectId($project->id)->makeCall($data);

        // User can't update not owned projects
        $response->assertStatus(417);
        $this->assertEquals('Failed to update Resource.', $this->getResponseContentObject()->message);
    }

}