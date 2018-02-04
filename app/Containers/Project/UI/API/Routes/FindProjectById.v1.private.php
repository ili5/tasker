<?php

/**
 * @apiGroup           Project
 * @apiName            findProjectById
 *
 * @api                {GET} /v1/projects/:id Endpoint title here..
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
$router->get('projects/{id}', [
    'as' => 'api_project_find_project_by_id',
    'uses'  => 'Controller@findProjectById',
    'middleware' => [
      'auth:api',
    ],
]);
