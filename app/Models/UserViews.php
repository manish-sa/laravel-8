<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserViews extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_views';

    protected $fillable = ['user_id', 'views'];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany('App\Models\User',  'user_views', 'user_id', 'id');
    }
}
