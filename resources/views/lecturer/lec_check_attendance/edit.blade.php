@extends('layouts.lecturer')

@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit attendance</h1>
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


    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

        {!! Form::model($attendance, ['method'=>'PATCH', 'action'=> ['LecturerAttendanceController@update', $attendance->id]]) !!}

            <div class="form-group">
                {!! Form::label('course_name', 'Course name:') !!}
                {!! Form::select('course_name', [''=>'Choose course'] + $courses, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('lecturer_name', 'Lecturer name:') !!}
                {!! Form::select('lecturer_name', [''=>'Choose lecturer'] + $lecs, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('class_title', 'Class title:') !!}
                {!! Form::text('class_title', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
                {!! Form::label('class_description', 'What was the class about?:') !!}
                {!! Form::textarea('class_description', null, ['class'=>'form-control','rows'=>2])!!}
            </div>





            <div class="form-group">
                {!! Form::submit('Update Record', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['LecturerAttendanceController@destroy', $attendance->id]]) !!}

             <div class="form-group">
                 {!! Form::submit('Delete attendance', ['class'=>'btn btn-danger col-sm-6']) !!}
             </div>
        {!! Form::close() !!}


        </div>

        <div class="col-sm-2"></div>

    </div>


    <div class="row">


        @include('includes.form_error')



    </div>




@stop
