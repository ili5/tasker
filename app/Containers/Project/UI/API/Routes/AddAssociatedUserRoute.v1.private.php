<?php

/**
 * @apiGroup           Project
 * @apiName            addAssociatedUser
 *
 * @api                {POST} /v1/associatedusers Endpoint title here..
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
$router->post('associatedusers', [
    'as' => 'api_project_add_associated_user',
    'uses'  => 'Controller@addAssociatedUser',
    'middleware' => [
      'auth:api',
    ],
]);
