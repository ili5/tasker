<?php

/**
 * @apiGroup           Project
 * @apiName            updateProject
 *
 * @api                {PATCH} /v1/projects/:id Endpoint title here..
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
$router->patch('projects/{id}', [
    'as' => 'api_project_update_project',
    'uses'  => 'Controller@updateProject',
    'middleware' => [
      'auth:api',
    ],
]);
