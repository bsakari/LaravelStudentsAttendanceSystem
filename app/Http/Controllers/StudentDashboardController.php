<?php

namespace App\Http\Controllers;

use App\Attend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_email= Auth::user()->email;
        $classes = Attend::whereStudentEmail($user_email)->get();
        $classes_count = count($classes);

        $approved_classes = Attend::where([ ['student_email', '=', $user_email], ['is_approved', '=', '1'] ])->get();
        $approved_classes_count = count($approved_classes);

        $rejected_classes = Attend::where([ ['student_email', '=', $user_email], ['is_approved', '=', '2'] ])->get();
        $rejected_classes_count = count($rejected_classes);

        if ($classes_count == 0){
            $attendance_rate = 0;
        }else{
            $attendance_rate = ($approved_classes_count * 100)/$classes_count;
        }
        return view('student.index',compact('classes_count','approved_classes_count','rejected_classes_count','attendance_rate'));
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
