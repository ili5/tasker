<?php

namespace App\Containers\Project\UI\API\Requests;

use App\Ship\Parents\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProjectRequest.
 */
class UpdateProjectRequest extends Request
{

    /**
     * The assigned Transporter for this Request
     *
     * @var string
     */
    protected $transporter = \App\Containers\Project\Data\Transporters\UpdateProjectTransporter::class;

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
         'id',
    ];

    /**
     * Defining the URL parameters (e.g, `/user/{id}`) allows applying
     * validation rules on them and allows accessing them like request data.
     *
     * @var  array
     */
    protected $urlParameters = [
         'id',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'id'    =>  'required',
            'name'  =>  [
                'required',
                'min: 3',
                Rule::unique('projects')->where(function ($query) {
                    $params = request()->route()->parameters('id');
                    dd($params);
                    $id = $params['id'];
                    return $query->where('user_id', Auth()->user()->id)
                        ->where('id', '!=', $this->decode($id));
                })
            ]
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
