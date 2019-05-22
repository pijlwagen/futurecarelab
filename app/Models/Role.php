<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table ='roles';

    protected $fillable = ['name'];

    public function getUsers()
    {
        $this->hasMany('App\User', 'role', 'id')->get();
    }
}
