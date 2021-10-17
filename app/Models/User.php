<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    public function roles()
    {
        return $this->belongsToMany('App\Models\Roles',  'user_roles', 'id', 'role_id');
    }

    public function industries()
    {
        return $this->belongsToMany('App\Models\Industries',  'user_industries', 'id', 'industry_id');
    }
}
