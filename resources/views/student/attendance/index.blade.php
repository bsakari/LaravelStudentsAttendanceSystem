@extends('layouts.student')

@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attendance summary</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Logged in as</a></li>
                        <li class="breadcrumb-item active">Student</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <table class="table">
       <thead>
         <tr>
             <th>Student</th>
             <th>Course</th>
             <th>Lecturer</th>
             <th>Class title</th>
             <th>Class description</th>
             <th>Attended on</th>
             <th>Status</th>
        </thead>
        <tbody>

        @if($attendances)


            @foreach($attendances as $attendance)

          <tr>
{{--              <td> <img height="50" src="{{asset('images/'.$attendance->photo_one )}}" alt="" ></td>--}}
              <td>
                  @if($attendance->is_approved == 0)
                      <a href="{{route('attendance.edit', openssl_encrypt($attendance->id,"AES-128-ECB","jghfhskd@#$%%^hflhakdhf3232323232ahkjgf&^^%$&(((^%$$####adskghk8768886djhghkdsjgjkdg"))}}">{{$attendance->student_name}}</a>
                  @else
                      <p>{{$attendance->student_name}}</p>
                  @endif
              </td>
              <td>{{$attendance->course_name}}</td>
              <td>{{$attendance->lecturer_name ? $attendance->lecturer_name : 'No lecturer'}}</td>
              <td>{{$attendance->class_title}}</td>
              <td>{{$attendance->class_description}}</td>
              <td>{{$attendance->attendance_date}}</td>
              <td>
                  @if($attendance->is_approved == 0)
                      <button class="btn btn-warning btn-block">Pending</button>
                  @elseif($attendance->is_approved == 1)
                      <button class="btn btn-success btn-block">Approved</button>
                  @else
                      <button class="btn btn-danger btn-block">Rejected</button>
                  @endif
              </td>

          </tr>

            @endforeach

            @endif

       </tbody>
     </table>



    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">

            {{$attendances->render()}}

        </div>
    </div>



@stop
