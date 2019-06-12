<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave_request extends Model
{
    protected $table="leave_request";
    
    protected $fillable = [
        'staff_id','leave_id','status', 'start_date', 'end_date','resumption_date','days','approved_by_id'
    ];

    public function leave(){
        return $this->belongsTo('App\Leave','leave_id');
    }

    public function staff(){
        return $this->belongsTo('App\Staff','staff_id');
    }

    public function approvedBy(){
        return $this->belongsTo('App\User','approved_by_id');
    }
}
