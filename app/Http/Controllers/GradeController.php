<?php

namespace App\Http\Controllers;

use App\Staff_grade;
use App\Grade_leave;
use App\Leave;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Staff_grade::all();
        $leaves = Leave::all();
        return view('grade.all',compact('grades','leaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storegrade(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|unique:staff_grade',
        ]);

        $grade = Staff_grade::create([
            'name' => $request->name,
            'level' =>$request->level
        ]);

        session()->flash('success','Grade saved');
        return back();
    }

    public function createAttach(){
        $grades = Staff_grade::all();
        $leaves = Leave::all();
        return view('grade.leaveTograde',compact('grades','leaves'));
    }

    public function attachLeave(Request $request){
        $grade_level = Grade_leave::create([
            'grade_level' => $request->grade_id,
            'leave_id' => $request->leave_id,
            'days' =>$request->days
        ]);

        session()->flash('success','Leave attached');
        return redirect()->route('grade');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff_grade  $staff_grade
     * @return \Illuminate\Http\Response
     */
    public function show(Staff_grade $staff_grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff_grade  $staff_grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff_grade $staff_grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff_grade  $staff_grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff_grade $staff_grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff_grade  $staff_grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff_grade $staff_grade)
    {
        //
    }
}
