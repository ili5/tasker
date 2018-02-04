<?php

namespace App\Containers\Task\UI\API\Controllers;

use App\Containers\Task\UI\API\Requests\CreateTaskRequest;
use App\Containers\Task\UI\API\Requests\DeleteTaskRequest;
use App\Containers\Task\UI\API\Requests\GetAllTasksRequest;
use App\Containers\Task\UI\API\Requests\FindTaskByIdRequest;
use App\Containers\Task\UI\API\Requests\UpdateTaskRequest;
use App\Containers\Task\UI\API\Transformers\TaskTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Task\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTask(CreateTaskRequest $request)
    {
        $task = Apiato::call('Task@CreateTaskAction', [$request]);

        return $this->created($this->transform($task, TaskTransformer::class));
    }

    /**
     * @param FindTaskByIdRequest $request
     * @return array
     */
    public function findTaskById(FindTaskByIdRequest $request)
    {
        $task = Apiato::call('Task@FindTaskByIdAction', [$request]);

        return $this->transform($task, TaskTransformer::class);
    }

    /**
     * @param GetAllTasksRequest $request
     * @return array
     */
    public function getAllTasks(GetAllTasksRequest $request)
    {
        $tasks = Apiato::call('Task@GetAllTasksAction', [$request]);

        return $this->transform($tasks, TaskTransformer::class);
    }

    /**
     * @param UpdateTaskRequest $request
     * @return array
     */
    public function updateTask(UpdateTaskRequest $request)
    {
        $task = Apiato::call('Task@UpdateTaskAction', [$request]);

        return $this->transform($task, TaskTransformer::class);
    }

    /**
     * @param DeleteTaskRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTask(DeleteTaskRequest $request)
    {
        Apiato::call('Task@DeleteTaskAction', [$request]);

        return $this->noContent();
    }
}
