<?php

/**
 * @apiGroup           User
 * @apiName            searchUserForProjectAssociation
 *
 * @api                {POST} /v1/searchusers Endpoint title here..
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
$router->post('searchusers', [
    'as' => 'api_user_search_user_for_project_association',
    'uses'  => 'Controller@searchUserForProjectAssociation',
    'middleware' => [
      'auth:api',
    ],
]);
