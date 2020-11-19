@extends('layouts.control_panel_layout')

@section('title','Students')

@section('content')

    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Students</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.students.index')}}">Students</a></li>
                    <li class="breadcrumb-item active">{{$student->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="zmdi zmdi-account"></i></div>
                        <div class="content">
                            <div class="text">Student</div>
                            <h5 class="number">{{$student->name}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="fa fa-at"></i></div>
                        <div class="content">
                            <div class="text">Email</div>
                            <h5 class="number">{{$student->email}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="fa fa-list"></i></div>
                        <div class="content">
                            <div class="text">Number Of Courses</div>
                            <h5 class="number">{{count($student->courses)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card top_counter">
                    <div class="body">
                        <div class="icon xl-slategray"><i class="fa fa-images"></i></div>
                        <div class="content">
                            <div class="text">Number of Images</div>
                            <h5 class="number">{{count($student->images)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <h4>Registered Courses</h4>
                <div class="tab-content m-t-10">
                    <div class="tab-pane active">
                        <div class="row clearfix">
                            @foreach($student->courses as $course)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card member-card doctor">
                                        <div class="body">
                                            <div class="member-thumb">
                                                <img src="{{$course->university->imagePath()}}"
                                                     class="img-fluid" alt="profile-image">
                                            </div>
                                            <div class="detail">
                                                <h4 class="m-b-0">{{$course->name}}</h4>
                                                <p class="text-muted mt-2">Fees : {{$course->fees}}$</p>
                                                <p class="text-muted">Duration
                                                    : {{$course->duration}} {{$course->duration > 1 ? 'Months':'Month'}}</p>
                                                <p class="text-muted">Course Type : {{$course->type->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
