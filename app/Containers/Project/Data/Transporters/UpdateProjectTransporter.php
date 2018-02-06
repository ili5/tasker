<?php

namespace App\Containers\Project\Data\Transporters;

use App\Ship\Parents\Transporters\Transporter;

class UpdateProjectTransporter extends Transporter
{

    /**
     * @var array
     */
    protected $schema = [
        'type' => 'object',
        'properties' => [
            // enter all properties here

            // allow for undefined properties
            // 'additionalProperties' => true,
        ],
        'required'   => [
            // define the properties that MUST be set
            'id'
        ],
        'default'    => [
            // provide default values for specific properties here
        ]
    ];
}
