<?php

/**
 * @apiGroup           Task
 * @apiName            updateTask
 *
 * @api                {PATCH} /v1/tasks/:id Endpoint title here..
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
$router->patch('tasks/{id}', [
    'as' => 'api_task_update_task',
    'uses'  => 'Controller@updateTask',
    'middleware' => [
      'auth:api',
    ],
]);
