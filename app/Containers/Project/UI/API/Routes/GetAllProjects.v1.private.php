<?php

/**
 * @apiGroup           Project
 * @apiName            getAllProjects
 *
 * @api                {GET} /v1/projects Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->get('projects', [
    'as' => 'api_project_get_all_projects',
    'uses'  => 'Controller@getAllProjects',
    'middleware' => [
      'auth:api',
    ],
]);
