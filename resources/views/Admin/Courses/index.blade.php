@extends('layouts.control_panel_layout')


@section('title','Universities')


@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Courses</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.courses.index')}}">Courses</a></li>
                    <li class="breadcrumb-item active">All Courses</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>All Courses</strong></h2>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <a href="{{route('admin.courses.create')}}" class="btn btn-primary">Add New Course</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>University</th>
                                    <th>Type</th>
                                    <th>Categories</th>
                                    <th>Duration</th>
                                    <th>Fees</th>
                                    @canany(['edit-course','delete-course'])
                                        <th>action</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{$course->name}}</td>
                                        <td>{{$course->university->name}}</td>
                                        <td>{{$course->type->name}}</td>
                                        <td>
                                            @foreach($course->categories as $category)
                                                {{$category->name}} @if(!$loop->last), @endif
                                            @endforeach
                                        </td>
                                        <td>{{$course->duration}} {{$course->duration > 1 ? 'Months' : 'Month'}}</td>
                                        <td>{{$course->fees}}</td>
                                        @canany(['edit-course','delete-course'])
                                            <td>
                                                @can('edit-course')
                                                    <a href="{{route('admin.courses.edit',$course->id)}}"
                                                       title="Edit {{$course->name}}" class="mr-3"><i
                                                            class="fas fa-edit"></i></a>
                                                @endcan

                                                @can('delete-course')
                                                    <form id="delete-course{{$course->id}}"
                                                          action="{{route('admin.courses.destroy',$course->id)}}"
                                                          method="post" style="display: none;">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                    <a href="#"
                                                       title="Delete {{$course->name}}"
                                                       onclick="deleteCourse({{$course->id}})"><i
                                                            class="fas fa-trash"></i></a>
                                                @endcan
                                            </td>
                                        @endcan
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

@section('page_scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script>
        function deleteCourse(id) {
            swal({
                title: "Are you sure?",
                text: "You Want to Delete This Course",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                document.getElementById('delete-course' + id).submit();
            });
        }

    </script>
@endsection
