<?php

namespace App;

use App\Models\BlockedUser;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified', 'address', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role')->first()->name === 'admin';
    }

    public function getRole()
    {
        return $this->hasOne(Role::class, 'id', 'role')->first();
    }

    public function isVerified()
    {
        return !!($this->verified === 1);
    }

    public function isBlocked()
    {
        return $this->hasOne(BlockedUser::class, 'user_id', 'id')->first();
    }
}
