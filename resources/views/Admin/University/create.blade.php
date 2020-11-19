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
                <h2>Universities</h2>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{URL('/')}}"><i class="zmdi zmdi-home"></i> Oreo</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.universities.index')}}">Universities</a></li>
                    <li class="breadcrumb-item active">Add University</li>
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
                            <strong>Add University</strong>
                            <small>
                                Enter University Information
                            </small>
                        </h2>
                    </div>
                    <div class="body">

                        @include('admin_errors')

                        <form role="form" action="{{route('admin.universities.store')}}" method="post" class="col-sm-12"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="row col-md-3 col-sm-12 float-left">
                                <div class="col-sm-12">
                                    <div class="">
                                        <p>University Logo</p>
                                        <div class="img-picker">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 clearfix col-lg-9 col-sm-12 float-right">
                                <div class="col-md-6 col-sm-12">
                                    <label>University Name</label>
                                    <div class="input-group @error('name') has-danger @enderror">
                                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <label>Founding Year</label>
                                    <div class="input-group @error('founding_year') has-danger @enderror">
                                        <input type="number" step="0.5" name="founding_year" class="form-control"
                                               placeholder="Year" value="{{ old('founding_year') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-5">
                                    <label>Institution Type</label>
                                    <div class="input-group @error('institution_type') has-danger @enderror">
                                        <input type="text" name="institution_type" class="form-control"
                                               placeholder="Institution Type" value="{{ old('institution_type') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 mt-5">
                                    <label>Website URL</label>
                                    <div class="input-group @error('website') has-danger @enderror">
                                        <input type="text" name="website" class="form-control"
                                               placeholder="URL" value="{{ old('website') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix col-sm-12">
                                <div class="col-sm-12">
                                    <div class="form-group mt-5 @error('about') has-danger @enderror">
                                        <label>About University</label>
                                        <textarea name="about" class="form-control" rows="5"
                                                  placeholder="About">{{ old('about') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round float-right">Submit</button>
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
