<?php

namespace App\Http\Controllers;

use App\Leave;
use App\Leave_request;
use App\Staff;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::all();
        return view('leave.all',compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leave.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $leave = Leave::create(['name' => $request->name]);
        session()->flash('success','Leave saved');
        return back();
    }

    public function cretateleaveRequest()
    {
        $leaves = Leave::all();
        return view('leave.newLeaveRequest',compact('leaves'));
    }

    public function storeLeaveReq(Request $request)
    {
        $request->validate([
            'leave_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'resumption_date' => 'required',
        ]);

        $to = \Carbon\Carbon::createFromFormat('Y-m-d', $request->end_date);
        $from = \Carbon\Carbon::createFromFormat('Y-m-d', $request->start_date);
        $diff_in_days = $to->diffInDays($from);
        
        $staff = Staff::where('user_id',Auth::id())->first();
        
        // if($diff_in_days > 10){
        //     session()->flash('error','You cant take more than 10 working days at a stretch');
        //     return back();
        // }
        // if($staff->AnnLeaveBal() > $diff_in_days){
        //     session()->flash('error','You have'. $staff->AnnLeaveBal() . 'annual leave days left');
        //     return back();
        // }

        $leaveReq = Leave_request::create([
            'staff_id' => $staff->id,
            'leave_id' => $request->leave_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'resumption_date' => $request->resumption_date,
            'days' =>$diff_in_days
        ]);
        session()->flash('success','Leave Requested');
        return redirect('/staff/leaveRequest');

        
    }

    public function leaveRequest(){
        $staff_id = Staff::where('user_id',Auth::id())->pluck('id')->first();
        $leaveReqs = Leave_request::where('staff_id',$staff_id)->get();
        return view('leave.leaverequest',compact('leaveReqs'));
    }


    public function leaveApproval(){
        $leaveapps = Leave_request::whereHas('staff',
        function ($query){
            $query->where('line_manager_id', Auth::id());
        })->get();
        return view('leave.leaveApprovals',compact('leaveapps'));
    }

    public function approveLeave(Request $request, $id)
    {
        $approval = Leave_request::where('id',$id)->update([
            'status' => $request->status,
            'approved_by_id' => Auth::id()
        ]);
        if($request->status == '1')
            {session()->flash('success','Request Rejected');}
        else{session()->flash('success','Leave Request Approved');}

        return redirect('/staff/leaveApproval');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
