<?php

namespace App\Http\Controllers;

use App\Attend;
use App\Course;
use App\Http\Requests\StudentAttendRequest;
use App\Lecturer;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentAttendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_email= Auth::user()->email;
        $attendances = Attend::whereStudentEmail($user_email)->orderBy('id', 'DESC')->paginate(25);

        return view('student.attendance.index', compact('attendances'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lecturers =Lecturer::pluck('name','name')->all();
        $courses = Course::pluck('name','name')->all();



        return view('student.attendance.create', compact('lecturers','courses'));
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
        $file1 = $request->file('photo_one');
        $file2 = $request->file('photo_two');
        $file3 = $request->file('photo_three');
        $file4 = $request->file('photo_four');
        if($file1 and $file2 and $file3 and $file4) {


            $name1 = time() . $file1->getClientOriginalName();
            $name2 = time() . $file2->getClientOriginalName();
            $name3 = time() . $file3->getClientOriginalName();
            $name4 = time() . $file4->getClientOriginalName();


            $file1->move('images', $name1);
            $file2->move('images', $name2);
            $file3->move('images', $name3);
            $file4->move('images', $name4);


        }
        $input = $request->all();
        $user = Auth::user();
        $studentEmail = $user->email;
        $studentName = $user->name;
        $classTitle = $input['class_title'];
        $classDescription = $input['class_description'];
        $courseName = $input['course_name'];
        $lecturerName = $input['lecturer_name'];
        $attendanceDate = date("l jS \of F Y h:i:s A");
        $attendanceDateObject = DateTime::createFromFormat('l jS \of F Y h:i:s A', $attendanceDate);


        date_timezone_set($attendanceDateObject, timezone_open('Africa/Nairobi'));

        Attend::create(['student_name'=>$studentName,'student_email'=>$studentEmail,'class_title'=>$classTitle,
            'class_description'=>$classDescription,'course_name'=>$courseName,'lecturer_name'=>$lecturerName,'attendance_date'=>$attendanceDateObject,
            'photo_one'=>$name1,'photo_two'=>$name2,'photo_three'=>$name3,'photo_four'=>$name4]);

        Session::flash('submitted_attendance','Attendance submitted successfully');

        return redirect()->back();
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
        $attendance = Attend::findOrFail($id);

        $lecturers =Lecturer::pluck('name','name')->all();
        $courses = Course::pluck('name','name')->all();




        return view('student.attendance.edit', compact('attendance','lecturers','courses'));
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

        return redirect('student/attendance');
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
        return redirect('student/attendance');
    }
}
