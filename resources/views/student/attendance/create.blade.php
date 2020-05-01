@extends('layouts.student')

@section('contents')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attend a class</h1>
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
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <label style="color: black; font-size: 2em; font-weight: bold;">.</label>Fields marked with <label style="color: red;">*</label> are required

            @include('includes.form_error')

            @if(Session::has('submitted_attendance'))
                <p class="bg-danger"></p>
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('submitted_attendance')}}
                </div>
            @endif
        </div>
        <div class="col-sm-2"></div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            {!! Form::open(['method'=>'POST', 'action'=> 'StudentAttendController@store','files'=>true]) !!}
            {!! csrf_field() !!}

            <div class="form-group">
                {!! Form::label('course_name', 'Course name:') !!}<label style="color: red;">*</label>
                {!! Form::select('course_name', [''=>'Choose course'] + $courses, null, ['class'=>'form-control'])!!}

            </div>

            <div class="form-group">
                {!! Form::label('lecturer_name', 'Lecturer name:') !!}<label style="color: red;">*</label>
                {!! Form::select('lecturer_name', [''=>'Choose lecturer'] + $lecturers, null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('class_title', 'Class title:') !!}<label style="color: red;">*</label>
                {!! Form::text('class_title', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::label('class_description', 'What was the class about?:') !!}<label style="color: red;">*</label>
                {!! Form::textarea('class_description', null, ['class'=>'form-control', 'rows' => 2, 'cols' => 40])!!}
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('photo_one', 'Pic 1:') !!}<label style="color: red;">*</label>
                    {!! Form::file('photo_one', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('photo_two', 'Pic 2:') !!}<label style="color: red;">*</label>
                    {!! Form::file('photo_two', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('photo_three', 'Pic 3:') !!}<label style="color: red;">*</label>
                    {!! Form::file('photo_three', null, ['class'=>'form-control'])!!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    {!! Form::label('photo_four', 'Pic 4:') !!}<label style="color: red;">*</label>
                    {!! Form::file('photo_four', null, ['class'=>'form-control'])!!}
                </div>
            </div>




            <div class="form-group">
                {!! Form::submit('Submit Attendance', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
        <div class="col-sm-2"></div>

    </div>







@stop
