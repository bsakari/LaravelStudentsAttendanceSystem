<?php

namespace App\Http\Controllers;

use App\Attend;
use App\Course;
use App\Http\Requests\StudentAttendRequest;
use App\Lecturer;
use Illuminate\Http\Request;

class LecturerAttendanceController extends Controller
{
    //
    public function index()
    {
        //
        $lecturers = Lecturer::all();
        $attendances = Attend::orderBy('id', 'DESC')->paginate(25);

        return view('lecturer.lec_check_attendance.index', compact('attendances','lecturers'));

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
    public function store(StudentAttendRequest $request)
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

        $key="jghfhskd@#$%%^hflhakdhf3232323232ahkjgf&^^%$&(((^%$$####adskghk8768886djhghkdsjgjkdg";
        $decrypted_id=openssl_decrypt($id,"AES-128-ECB",$key);
        $lecturers = Lecturer::all();
        $details = Attend::findOrFail($decrypted_id);
        return view('lecturer.lec_check_attendance.details',compact('details','lecturers'));
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
        $attendance = Attend::findOrFail($id);
        $lecturers = Lecturer::all();

        $lecs =Lecturer::pluck('name','name')->all();
        $courses = Course::pluck('name','name')->all();




        return view('lecturer.lec_check_attendance.edit', compact('attendance','lecs','courses','lecturers'));
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
        Attend::findOrFail($id)->update($request->all());

        return redirect('/lecturer/check/lec_check_attendance');
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
        Attend::whereId($id)->delete();
        return redirect('lecturer/check/lec_check_attendance');
    }
}
