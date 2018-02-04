<?php

namespace App\Containers\Task\UI\API\Requests;

use App\Ship\Parents\Requests\Request;

/**
 * Class CreateTaskRequest.
 */
class CreateTaskRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Task\Data\Transporters\CreateTaskTransporter::class;

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * Id's that needs decoding before applying the validation rules.
     *
     * @var  array
     */
    protected $decode = [
        'project_id',
        'board_id',
        'assigned_id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
        // 'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'project_id' => 'required',
            'board_id' => 'required',
            'assigned_id' => 'required',
            'title' =>  'required',
            'description'   =>  'required'
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
