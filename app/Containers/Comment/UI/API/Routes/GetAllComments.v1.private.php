<?php

/**
 * @apiGroup           Comment
 * @apiName            getAllComments
 *
 * @api                {GET} /v1/comments Endpoint title here..
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
$router->get('comments', [
    'as' => 'api_comment_get_all_comments',
    'uses'  => 'Controller@getAllComments',
    'middleware' => [
      'auth:api',
    ],
]);
