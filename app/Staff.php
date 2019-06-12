<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table= "staff";

    protected $fillable = [
        'user_id','staff_no', 'line_manager_id', 'grade_id'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function lineManager(){
        return $this->belongsTo('App\User','line_manager_id');
    }

    public function grade(){
        return $this->belongsTo('App\Staff_grade','grade_id');
    }

    public function leave_days(){
        $leave = \App\Grade_leave::where([
            ['leave_id','3'],
            ['grade_level',$this->grade_id]
            ])->pluck('days')->first();
        return $leave;
    }

    public function AnnLeaveBal()
    {
        $leave_taken = \App\Leave_request::where([
            ['staff_id',$this->id],
            ['leave_id','3'],
            ['status','2']
            ])->sum('days');
            
        $given_leave = $this->leave_days();
        $balance = $given_leave - $leave_taken;
        return $balance;
    }
}
