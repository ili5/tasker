<?php

/**
 * @apiGroup           User
 * @apiName            me
 *
 * @api                {GET} /v1/me Endpoint title here..
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
$router->get('me', [
    'as' => 'api_user_me',
    'uses'  => 'Controller@me',
    'middleware' => [
      'auth:api',
    ],
]);
