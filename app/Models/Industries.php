<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industries extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'industries';

    /**
     * The users that belong to the 
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_industries');
    }
}
