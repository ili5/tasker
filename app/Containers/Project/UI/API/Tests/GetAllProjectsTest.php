<?php
namespace App\Containers\Project\UI\API\Tests\Functional;


use App\Containers\Project\Models\Project;
use App\Containers\Project\Tests\TestCase;
use App\Containers\User\Models\User;
use Illuminate\Support\Facades\Config;

class GetAllProjectsTest extends TestCase
{
    protected $endpoint = 'get@v1/projects';

    protected $auth = false;

    protected $access = [
        'roles' =>  'client',
        'permissions'   =>  ''
    ];

    function testUnauthorizedUserCantSeeProjects()
    {
        $response = $this->json('GET', Config::get('apiato.api.url') . '/v1/projects');
        $response->assertStatus(401);
    }

    function testGetAllOwnedProjects()
    {
        // create user
        $user = $this->getTestingUser();

        // create user projects
        factory(Project::class, 2)->create([
            'user_id' => $user->id
        ]);

        // send HTTP request
        $response = $this->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        // convert JSON response to Object
        $responseContent = $this->getResponseContentObject();

        // assert the returned data size is correct
        $this->assertCount(2, $responseContent->data);
    }

    function testGetAssociatedProjects()
    {
        $projectAssociatedUser = $this->getTestingUser();

        $projectOwner = factory(User::class)->create();

        factory(Project::class, 2)->create([
            'user_id'   =>  $projectOwner->id
        ])->each(function($project) use ($projectAssociatedUser){
            $project->associatedUsers()->sync($projectAssociatedUser);
        });

        $response = $this->makeCall();

        $response->assertStatus(200);

        $responseContent = $this->getResponseContentObject();

        $this->assertCount(2, $responseContent->data);
    }

    function testUserCantSeeUnassociatedProjects()
    {
        $this->getTestingUser();

        $projectOwner = factory(User::class)->create();

        factory(Project::class)->create([
            'user_id'   =>  $projectOwner->id
        ]);

        $response = $this->makeCall();

        $response->assertStatus(200);

        $responseContent = $this->getResponseContentObject();

        $this->assertCount(0, $responseContent->data);
    }



}