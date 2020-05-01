@extends('layouts.lecturer')

@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Per Class Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Logged in as</a></li>
                        <li class="breadcrumb-item active">Lecturer</li>
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
             <th>Details</th>
        </thead>
        <tbody>

        @if($attendances)


            @foreach($attendances as $attendance)

          <tr>
              <td>{{$attendance->student_name}}</td>
              <td>{{$attendance->course_name}}</td>
              <td>{{$attendance->lecturer_name ? $attendance->lecturer_name : 'No lecturer'}}</td>
              <td>{{$attendance->class_title}}</td>
              <td>{{$attendance->class_description}}</td>
              <td>{{$attendance->attendance_date}} ( {{$attendance->created_at->diffForHumans()}} )</td>
              <td>
                  @if($attendance->is_approved == 1)


                      {!! Form::open(['method'=>'PATCH', 'action'=> ['LecturerAttendanceController@update', $attendance->id]]) !!}


                      <input type="hidden" name="is_approved" value="2">


                      <div class="form-group">
                          {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                      </div>
                      {!! Form::close() !!}


                  @else



                      {!! Form::open(['method'=>'PATCH', 'action'=> ['LecturerAttendanceController@update', $attendance->id]]) !!}


                      <input type="hidden" name="is_approved" value="1">


                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-danger']) !!}
                      </div>
                      {!! Form::close() !!}




                  @endif
              </td>
              <td><a href="/lecturer/check/{{openssl_encrypt($attendance->id,"AES-128-ECB","jghfhskd@#$%%^hflhakdhf3232323232ahkjgf&^^%$&(((^%$$####adskghk8768886djhghkdsjgjkdg")}}" class="btn btn-dark btn-block">Details</a></td>


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
