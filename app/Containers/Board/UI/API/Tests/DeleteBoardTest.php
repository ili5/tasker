<?php
namespace App\Containers\Board\UI\API\Tests;

use App\Containers\Board\Models\Board;
use App\Containers\Board\Tests\TestCase;
use App\Containers\Project\Models\Project;

class DeleteBoardTest extends TestCase {
    protected $endpoint = 'delete@v1/boards/{id}';

    function testOnlyOwnerCanDeleteBoard()
    {
        $user = $this->getTestingUser();

        $board = factory(Board::class)->create([
            'project_id'    =>  factory(Project::class)->create([
                'user_id'   =>  $user->id
            ])->id
        ]);

        $response = $this->injectId($board->id)->makeCall();

        $response->assertStatus(204);
    }

    function testAssociatedUserCantDeleteBoard()
    {
        $user = $this->getTestingUser();

        $project = factory(Project::class)->create();
        $project->associatedUsers()->sync($user->id);

        $board = factory(Board::class)->create([
            'project_id'    =>  $project->id
        ]);

        $response = $this->injectId($board->id)->makeCall();

        $response->assertStatus(417);
    }
}