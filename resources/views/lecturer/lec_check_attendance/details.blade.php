@extends('layouts.lecturer')

@section('contents')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attendance details</h1>
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

    @if($details)
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <h4 class="m-0 text-dark">{{$details['class_title']}}</h4>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <p class="breadcrumb-item active">{{$details['class_description']}}</p>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
        </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <img src="{{asset('images/'.$details['photo_one'])}}" alt="" class="detail_img">
                </div>
                <div class="col-sm-5">
                    <img src="{{asset('images/'.$details['photo_two'])}}" alt="" class="detail_img">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <img src="{{asset('images/'.$details['photo_three'])}}" alt="" class="detail_img">
                </div>
                <div class="col-sm-5">
                    <img src="{{asset('images/'.$details['photo_four'])}}" alt="" class="detail_img">
                </div>
                <div class="col-sm-1"></div>
            </div>
    @endif



@stop
