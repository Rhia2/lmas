<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade_leave extends Model
{
    protected $table= "grade_leave";
    
    protected $fillable = [
        'grade_level','leave_id','days'
    ];

    public function leave(){
        return $this->belongsTo('App\Leave','leave_id');
    }

    public function grade(){
        $grade = \App\Staff_grade::where('level',$this->grade_level)->find();
        return $grade;
    }
}
