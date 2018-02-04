<?php
namespace App\Containers\Project\UI\API\Tests;

use App\Containers\Project\Tests\TestCase;
use Illuminate\Support\Facades\Config;

class CreateProjectTest extends TestCase{

    protected $endpoint = 'post@v1/projects';

    /**
     * Test creating project with authenticated user
     */
    function testCreatingProjectWithAuthorizedUser()
    {
        $user = $this->getTestingUser();
        $data = [
            'name'  =>  'Project Name',
            'description'   =>  'Project description'
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(201);

        $project = $this->getResponseContentObject();

        $this->assertEquals($data['name'],$project->data->name);

        $this->assertEquals($user->name, $project->data->user->data->name);
    }

    /**
     * Test creating project with unauthenticated user
     */
    function testCreatingProjectWithoutAuthorizedUser()
    {
        $data = [
            'name'  =>  'Project name',
            'description'   =>  'Project description'
        ];

        $response = $this->json('POST', Config::get('apiato.api.url') . '/v1/projects',
            $data);

        $response->assertStatus(401);
    }

    /**
     * Test project validators
     */
    function testCreatingProjectValidator()
    {
        $response = $this->makeCall([]);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['name']);
    }
}