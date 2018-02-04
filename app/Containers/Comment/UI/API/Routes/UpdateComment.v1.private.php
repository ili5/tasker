<?php

/**
 * @apiGroup           Comment
 * @apiName            updateComment
 *
 * @api                {PATCH} /v1/comments/:id Endpoint title here..
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
$router->patch('comments/{id}', [
    'as' => 'api_comment_update_comment',
    'uses'  => 'Controller@updateComment',
    'middleware' => [
      'auth:api',
    ],
]);
