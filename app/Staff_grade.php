<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_grade extends Model
{
    protected $table = "staff_grade";
    
    protected $fillable = [
        'name','level'
    ];

    public function staff(){
        return $this->hasMany('App\Staff','grade_id');
    }

    public function leave_days(){
        $leave = \App\Grade_leave::where('grade_level',$this->level)->get();
        return $leave;
    }
}
