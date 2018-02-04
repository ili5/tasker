<?php

/**
 * @apiGroup           Board
 * @apiName            getAllBoards
 *
 * @api                {GET} /v1/boards Endpoint title here..
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
$router->get('boards/{project_id}', [
    'as' => 'api_board_get_all_boards',
    'uses'  => 'Controller@getAllBoards',
    'middleware' => [
      'auth:api',
    ],
]);
