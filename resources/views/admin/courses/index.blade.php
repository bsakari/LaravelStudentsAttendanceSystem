@extends('layouts.admin')





@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Courses</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Logged in as</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-4">

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminCoursesController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Course', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}



        </div>

    <div class="col-sm-1"></div>


        <div class="col-sm-4">


            @if($courses)


                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Created date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($courses as $course)

                        <tr>
                            <td>{{$course->id}}</td>
                            <td><a href="{{route('courses.edit', $course->id)}}">{{$course->name}}</a></td>
                            <td>{{$course->created_at ? $course->created_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @endif



        </div>
<div class="col-sm-1"></div>

    </div>



@stop
