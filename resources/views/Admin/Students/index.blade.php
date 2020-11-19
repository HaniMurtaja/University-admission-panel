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
                    <li class="breadcrumb-item active">All Students</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Students</strong></h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Courses</th>
                                    <th>Uploaded Images</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>
                                            @foreach($student->courses as $course)
                                                -{{$course->name}}<br>
                                            @endforeach
                                        </td>
                                        <td>{{count($student->images)}}</td>
                                        <td>
                                            @can('show-single-student')
                                                <a href="{{route('admin.students.show',$student->id)}}"><i
                                                        class="fa fa-eye mr-3"></i></a>
                                            @endcan
                                            @can('download-student-pdf')
                                                <a href="{{route('admin.students.pdf',$student->id)}}"><i
                                                        class="fa fa-file-pdf"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
