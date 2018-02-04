<?php

namespace App\Containers\Board\Models;

use App\Containers\Project\Models\Project;
use App\Ship\Parents\Models\Model;

class Board extends Model
{
    protected $fillable = [
        'project_id', 'name'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'boards';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
