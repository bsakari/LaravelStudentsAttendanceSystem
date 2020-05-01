<?php

namespace App\Http\Controllers;

use App\Attend;
use App\Course;
use App\Lecturer;
use App\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total_students = User::whereRoleId(3)->get();
        $total_students_count = count($total_students);

        $inactive_students = User::whereIsActive(0)->get();
        $inactive_students_count = count($inactive_students);

        $active_students = User::where([ ['role_id', '=', '3'], ['is_active', '=', '1'] ])->get();
        $active_students_count = count($active_students);

        $completed_students = User::where([ ['role_id', '=', '3'], ['is_active', '=', '2'] ])->get();
        $completed_students_count = count($completed_students);

        $courses = Course::all();
        $courses_count = count($courses);

        $lecturers = Lecturer::all();
        $lecturers_count = count($lecturers);

        $administrators = User::whereRoleId(1)->get();
        $administrators_count = count($administrators);

        $all_attendance = Attend::where([['is_approved', '!=', '0']])->get();
        $all_attendance_count = count($all_attendance);

        $approved_attendace = Attend::whereIsApproved(1)->get();
        $approved_attendace_count = count($approved_attendace);
        if ($all_attendance_count==0){
            $percentage_attendance = 0;
        }else{
            $percentage_attendance = ($approved_attendace_count * 100)/$all_attendance_count;
        }

        return view('admin.index',compact('total_students_count','active_students_count',
                'courses_count','lecturers_count','administrators_count','percentage_attendance','completed_students_count','inactive_students_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
