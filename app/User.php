<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ultraware\Roles\Traits\HasRoleAndPermission;
use Ultraware\Roles;

class User extends Authenticatable implements Roles\Contracts\HasRoleAndPermission
{
    use Notifiable;
    use HasRoleAndPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function staff(){
        return $this->hasOne('App\Staff','user_id');
    }

    public function juniorStaff(){
        return $this->hasMany('App\Staff','line_manager_id');
    }

    public function approvedBy(){
        return $this->hasMany('App\Leave_request','approved_by_id');
    }
}
