<?php

/**
 * @apiGroup           Task
 * @apiName            deleteTask
 *
 * @api                {DELETE} /v1/tasks/:id Endpoint title here..
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
$router->delete('tasks/{id}', [
    'as' => 'api_task_delete_task',
    'uses'  => 'Controller@deleteTask',
    'middleware' => [
      'auth:api',
    ],
]);
