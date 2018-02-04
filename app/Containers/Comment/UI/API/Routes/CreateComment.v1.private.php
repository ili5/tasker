<?php

/**
 * @apiGroup           Comment
 * @apiName            createComment
 *
 * @api                {POST} /v1/comments Endpoint title here..
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
$router->post('comments', [
    'as' => 'api_comment_create_comment',
    'uses'  => 'Controller@createComment',
    'middleware' => [
      'auth:api',
    ],
]);
