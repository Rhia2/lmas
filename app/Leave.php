<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table= "leave";

    protected $fillable = [
        'name'
    ];

    public function leave_request(){
        return $this->hasMany('App\Leave_request','leave_id');
    }

    public function grade(){
        return $this->hasMany('App\Grade_leave','leave_id');
    }
}
