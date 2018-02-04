<?php

/**
 * @apiGroup           Board
 * @apiName            createBoard
 *
 * @api                {POST} /v1/boards Endpoint title here..
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
$router->post('boards', [
    'as' => 'api_board_create_board',
    'uses'  => 'Controller@createBoard',
    'middleware' => [
      'auth:api',
    ],
]);
