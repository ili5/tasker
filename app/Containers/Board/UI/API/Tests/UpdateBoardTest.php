<?php
namespace App\Containers\Board\UI\API\Tests;

use App\Containers\Board\Models\Board;
use App\Containers\Board\Tests\TestCase;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;

class UpdateBoardTest extends TestCase{
    protected $endpoint = 'patch@v1/boards/{id}';

    function testUpdateBoardAsProjectOwner()
    {
        $user = $this->getTestingUser();
        $project = factory(Project::class)->create([
            'user_id'   =>  $user->id
        ]);

        $board = factory(Board::class)->create([
            'project_id'    =>  $project->id
        ]);

        $data = [
            'name'  =>  'Updated board name'
        ];

        $response = $this->injectId($board->id)->makeCall($data);

        $response->assertStatus(200);

        $responseObject = $this->getResponseContentObject();

        $this->assertEquals($data['name'], $responseObject->data->name);
    }

    function testUpdateBoardAsAssociatedUser()
    {
        $project = factory(Project::class)->create([
            'user_id'   =>  factory(User::class)->create()->id
        ]);

        $board = factory(Board::class)->create([
            'project_id'    =>  $project->id
        ]);

        $data = [
            'name'  =>  'Updated board name'
        ];

        $response = $this->injectId($board->id)->makeCall($data);

        $response->assertStatus(417);
    }
}