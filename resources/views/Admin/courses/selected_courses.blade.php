@extends('layouts.home_layout')


@section('title', 'Selected Courses')

@section('assets')
    <link rel="stylesheet" href="{{asset('assets/plugins/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}">
@endsection

@section('content')

    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url({{asset('assets2/images/big_image_2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">
                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">Selected Courses</h1>
                        <p class="bcrumb"><a href="{{route('home')}}">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span><span
                                class="current">Selected Courses</span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 order-md-2">
                    @if(session()->has('error'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{session('error')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h1>Selected Courses</h1>
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td>University Name</td>
                                <td>Course Name</td>
                                <td>Tuition Fees</td>
                                <td>action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if($courses != null && count($courses) > 0)
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{$course->university}}</td>
                                        <td>{{$course->name}}</td>
                                        <td>{{$course->fees}}</td>
                                        <td>
                                            <form action="{{route('selected_courses.remove',$course->id)}}"
                                                  method="POST"
                                                  style="display: none;"
                                                  id="remove-course{{$course->id}}"
                                            >
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <button onclick="removeCourse({{$course->id}})"
                                                    class="btn btn-danger text-white">Remove
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3">There is No Selected Courses</td>
                                    <td><a href="{{route('courses')}}" class="btn btn-primary text-white">Courses</a>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($courses != null && count($courses) > 0)
                <div class="row mt-5 mb-5">
                    <h2>File Upload</h2>
                    <div class="col-sm-12 order-md-2">
                        <form action="{{route('selected_courses.saveImages')}}" id="dropzoneForm" class="dropzone"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="dz-message">
                                <div class="drag-icon-cph"><i class="fas fa-hand-point-up"></i></div>
                                <h3>Drop Images here or click to upload.</h3>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>

                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{route('selected_courses.save')}}" id="selected_form" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                        <div class="float-right">
                            <button class="btn btn-primary text-white" type="button"
                                    onclick="$('#selected_form').submit();">Process Application
                            </button>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
    <script>
        function removeCourse(id) {
            $(`#remove-course${id}`).submit();
        }

        Dropzone.options.dropzoneForm = {
            acceptedFiles: '.png,.jpg,.gif,.bmp,.jpeg',
            error(data) {
                if (data.xhr.status === 401) {
                    swal('Error', 'Please Login before Uploading Files', 'error');
                }
            },
        };
    </script>
@endsection
