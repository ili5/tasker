<?php

namespace App\Containers\Project\Models;

use App\Containers\Board\Models\Board;
use App\Containers\Task\Models\Task;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;

class Project extends Model
{
    protected $fillable = [
        'user_id', 'name', 'description'
    ];

    protected $attributes = [

    ];

    protected $hidden = [
        'user_id'
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
    protected $resourceKey = 'projects';

    public function boards()
    {
        return $this->hasMany(Board::class,'project_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function associatedUsers()
    {
        return $this->belongsToMany(User::class, 'projects_users');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
