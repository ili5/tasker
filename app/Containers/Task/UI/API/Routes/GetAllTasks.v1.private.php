<?php

/**
 * @apiGroup           Task
 * @apiName            getAllTasks
 *
 * @api                {GET} /v1/tasks Endpoint title here..
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
$router->get('tasks', [
    'as' => 'api_task_get_all_tasks',
    'uses'  => 'Controller@getAllTasks',
    'middleware' => [
      'auth:api',
    ],
]);
