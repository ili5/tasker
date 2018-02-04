<?php

namespace App\Containers\Board\UI\API\Controllers;

use App\Containers\Board\UI\API\Requests\CreateBoardRequest;
use App\Containers\Board\UI\API\Requests\DeleteBoardRequest;
use App\Containers\Board\UI\API\Requests\GetAllBoardsRequest;
use App\Containers\Board\UI\API\Requests\FindBoardByIdRequest;
use App\Containers\Board\UI\API\Requests\UpdateBoardRequest;
use App\Containers\Board\UI\API\Transformers\BoardTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Board\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBoardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBoard(CreateBoardRequest $request)
    {
        $board = Apiato::call('Board@CreateBoardAction', [$request]);

        return $this->created($this->transform($board, BoardTransformer::class));
    }

    /**
     * @param FindBoardByIdRequest $request
     * @return array
     */
    public function findBoardById(FindBoardByIdRequest $request)
    {
        $board = Apiato::call('Board@FindBoardByIdAction', [$request]);

        return $this->transform($board, BoardTransformer::class);
    }

    /**
     * @param GetAllBoardsRequest $request
     * @return array
     */
    public function getAllBoards(GetAllBoardsRequest $request)
    {
        $boards = Apiato::call('Board@GetAllBoardsAction', [$request]);

        return $this->transform($boards, BoardTransformer::class);
    }

    /**
     * @param UpdateBoardRequest $request
     * @return array
     */
    public function updateBoard(UpdateBoardRequest $request)
    {
        $board = Apiato::call('Board@UpdateBoardAction', [$request]);

        return $this->transform($board, BoardTransformer::class);
    }

    /**
     * @param DeleteBoardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBoard(DeleteBoardRequest $request)
    {
        Apiato::call('Board@DeleteBoardAction', [$request]);

        return $this->noContent();
    }
}
