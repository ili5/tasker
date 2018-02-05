<?php

namespace App\Containers\Task\Models;

use App\Containers\Board\Models\Board;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'board_id',
        'creator_id',
        'assigned_id',
        'title',
        'description',
        'due_date'
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
        'due_date'
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'tasks';

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_id');
    }
}
