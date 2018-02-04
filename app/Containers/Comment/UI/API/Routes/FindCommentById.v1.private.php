<?php

/**
 * @apiGroup           Comment
 * @apiName            findCommentById
 *
 * @api                {GET} /v1/comments/:id Endpoint title here..
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
$router->get('comments/{id}', [
    'as' => 'api_comment_find_comment_by_id',
    'uses'  => 'Controller@findCommentById',
    'middleware' => [
      'auth:api',
    ],
]);
