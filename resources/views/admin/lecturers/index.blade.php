@extends('layouts.admin')





@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Lecturers</h1>
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

            {!! Form::open(['method'=>'POST', 'action'=> 'AdminLecturersController@store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add lecturer', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}



        </div>

    <div class="col-sm-1"></div>


        <div class="col-sm-4">


            @if($lecturers)


                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Created date</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($lecturers as $lecturer)

                        <tr>
                            <td>{{$lecturer->id}}</td>
                            <td><a href="{{route('lecturers.edit', openssl_encrypt($lecturer->id,"AES-128-ECB","jghfhskd@#$%%^hflhakdhf3232323232ahkjgf&^^%$&(((^%$$####adskghk8768886djhghkdsjgjkdg"))}}">{{$lecturer->name}}</a></td>
                            <td>{{$lecturer->created_at ? $lecturer->created_at->diffForHumans() : 'no date'}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @endif



        </div>
<div class="col-sm-1"></div>

    </div>



@stop
