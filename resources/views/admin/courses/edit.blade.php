@extends('layouts.admin')

@section('contents')


    <h1>Lecturers</h1>


    <div class="col-sm-6">

        {!! Form::model($course, ['method'=>'PATCH', 'action'=> ['AdminCoursesController@update', $course->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Course', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminCoursesController@destroy', $course->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Course', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">






    </div>





@stop
