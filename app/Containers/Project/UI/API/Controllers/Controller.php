<?php

namespace App\Containers\Project\UI\API\Controllers;

use App\Containers\Project\UI\API\Requests\AddAssociatedUserRequest;
use App\Containers\Project\UI\API\Requests\CreateProjectRequest;
use App\Containers\Project\UI\API\Requests\DeleteProjectRequest;
use App\Containers\Project\UI\API\Requests\GetAllProjectsRequest;
use App\Containers\Project\UI\API\Requests\FindProjectByIdRequest;
use App\Containers\Project\UI\API\Requests\RemoveAssociatedUserRequest;
use App\Containers\Project\UI\API\Requests\UpdateProjectRequest;
use App\Containers\Project\UI\API\Transformers\ProjectTransformer;
use App\Containers\Project\UI\API\Transformers\SingleProjectTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Project\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createProject(CreateProjectRequest $request)
    {
        $project = Apiato::call('Project@CreateProjectAction', [$request]);

        return $this->created($this->transform($project, ProjectTransformer::class));
    }

    /**
     * @param FindProjectByIdRequest $request
     * @return array
     */
    public function findProjectById(FindProjectByIdRequest $request)
    {
        $project = Apiato::call('Project@FindProjectByIdAction', [$request]);

        return $this->transform($project, SingleProjectTransformer::class);
    }

    /**
     * @param GetAllProjectsRequest $request
     * @return array
     */
    public function getAllProjects(GetAllProjectsRequest $request)
    {
        $projects = Apiato::call('Project@GetAllProjectsAction', [$request]);

        return $this->transform($projects, ProjectTransformer::class);
    }

    /**
     * @param UpdateProjectRequest $request
     * @return array
     */
    public function updateProject(UpdateProjectRequest $request)
    {
        $project = Apiato::call('Project@UpdateProjectAction', [$request]);

        return $this->transform($project, ProjectTransformer::class);
    }

    /**
     * @param DeleteProjectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProject(DeleteProjectRequest $request)
    {
        Apiato::call('Project@DeleteProjectAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param RemoveAssociatedUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeAssociatedUser(RemoveAssociatedUserRequest $request)
    {
        Apiato::call('Project@RemoveAssociatedUserAction', [$request]);

        return $this->noContent();
    }

    public function addAssociatedUser(AddAssociatedUserRequest $request)
    {
        $user = Apiato::call('Project@AddAssociatedUserAction', [$request]);

        return $this->transform($user, UserTransformer::class);
    }
}
