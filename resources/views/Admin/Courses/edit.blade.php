@extends('layouts.control_panel_layout')


@section('page_assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/image-picker.css')}}">

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
                    <li class="breadcrumb-item active">Edit Course</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Edit Course</strong>
                            <small>
                                Change Course Information
                            </small>
                        </h2>
                    </div>
                    <div class="body">

                        @include('admin_errors')

                        <form role="form" action="{{route('admin.courses.update',$course->id)}}" method="post"
                              class="col-sm-12"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group @error('name') has-danger @enderror">
                                        <label for="" class="label">Course Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                               value="{{ $course->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @error('fees') has-danger @enderror">
                                        <label for="" class="label">Course Fees</label>
                                        <input type="number" class="form-control" name="fees" placeholder="Fees"
                                               value="{{ $course->fees }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @error('duration') has-danger @enderror">
                                        <label for="" class="label">Course Duration <span class="text-danger"
                                                                                          style="font-size: 12px">In Months</span></label>
                                        <input type="number" class="form-control" name="duration"
                                               placeholder="Duration" value="{{ $course->duration }}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group @error('type_id') has-danger @enderror">
                                        <label for="" class="label">Course Type</label>
                                        <select name="type_id" class="form-control show-tick">
                                            <option value="0" selected disabled>Type</option>
                                            @foreach($types as $type)
                                                <option
                                                    value="{{$type->id}}" {{ $course->type->id == $type->id ? 'selected' : ''}}>
                                                    {{$type->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group @error('categories') has-danger @enderror">
                                        <label for="" class="label">Course Category</label>
                                        <select name="categories[]" multiple class="form-control z-index show-tick"
                                                data-live-search="true" tabindex="-98">
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{$category->id}}"
                                                @foreach($course->categories as $categ)
                                                    @if($categ->id == $category->id)
                                                        {{'selected'}}
                                                        @endif
                                                    @endforeach
                                                >{{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="" class="label">University</label>
                                        <select name="university_id"
                                                class="form-control z-index show-tick @error('university_id') has-danger @enderror"
                                                data-live-search="true" tabindex="-98">
                                            <option value="0" selected disabled>University</option>
                                            @foreach($universities as $university)
                                                <option
                                                    value="{{$university->id}}" {{ $course->university->id == $university->id ? 'selected' : ''}}>
                                                    {{$university->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea class="form-control" name="description" cols="30" rows="5"
                                                  placeholder="description">{{$course->description}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection



@section('page_scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/image-picker.js')}}"></script>


    <script>
        $('.has-danger').keypress(function () {
            $(this).removeClass('has-danger');
        });
    </script>

@endsection
