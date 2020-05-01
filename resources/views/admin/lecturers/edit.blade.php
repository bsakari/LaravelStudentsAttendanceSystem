@extends('layouts.admin')

@section('contents')


    <h1>Lecturers</h1>


    <div class="col-sm-6">

        {!! Form::model($lecturer, ['method'=>'PATCH', 'action'=> ['AdminLecturersController@update', $lecturer->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Lecturer', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'action'=> ['AdminLecturersController@destroy', $lecturer->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Lecturer', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>




    <div class="col-sm-6">






    </div>





@stop
