<?php

/**
 * @apiGroup           Project
 * @apiName            removeAssociatedUser
 *
 * @api                {DELETE} /v1/associatedusers/:projectid/:userid Endpoint title here..
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
$router->delete('associatedusers/{projectId}/{userId}', [
    'as' => 'api_project_remove_associated_user',
    'uses'  => 'Controller@removeAssociatedUser',
    'middleware' => [
      'auth:api',
    ],
]);
