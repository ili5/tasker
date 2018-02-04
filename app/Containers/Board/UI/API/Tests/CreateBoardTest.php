<?php
namespace App\Containers\Board\UI\API\Tests;

use App\Containers\Board\Tests\TestCase;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;

class CreateBoardTest extends TestCase {

    protected $endpoint = 'post@v1/boards';

    function testProjectOwnerCanCreateBoard() {
        $user = $this->getTestingUser();
        $project = factory(Project::class)->create([
            'user_id'   =>  $user->id
        ]);

        $data = [
            'name'  =>  'Test Board',
            'project_id'    =>  $project->getHashedKey()
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(201);

        $responseObject = $this->getResponseContentObject();

        $this->assertEquals($data['name'], $responseObject->data->name);
    }

    function testAssociatedUserCantCreateBoardInProject() {
        $associatedUser = $this->getTestingUser();

        $project = factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()
        ]);

        $project->associatedUsers()->sync($associatedUser->id);

        $data = [
            'name'  =>  'Test Board',
            'project_id'    =>  $project->getHashedKey()
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['project_id']);
    }

    function testOtherUsersCantCreateBoardInProject() {
        $project = factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()
        ]);

        $data = [
            'name'  =>  'Test Board',
            'project_id'    =>  $project->getHashedKey()
        ];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['project_id']);
    }

    function testBoardCreatingValidation() {
        factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()
        ]);

        $data = [];

        $response = $this->makeCall($data);

        $response->assertStatus(422);

        $response->assertJsonValidationErrors(['project_id','name']);

    }
}