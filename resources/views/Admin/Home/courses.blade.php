@extends('layouts.home_layout')

@section('title','Courses')

@section('assets')


@endsection

@section('content')
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url({{asset('assets2/images/big_image_2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">
                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">Courses</h1>
                        <p class="bcrumb"><a href="{{route('home')}}">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span> <span
                                class="current">Courses</span></p>
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="mb-5 element-animate">
                        <div class="block-17">
                            <h2 class="heading text-center mb-4">Find Courses That Suits You</h2>
                            <form action="{{route('courses')}}" method="get" class="d-block d-lg-flex mb-4">
                                <div class="fields d-block d-lg-flex">
                                    <div class="textfield-search one-third">
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Keyword search...">
                                    </div>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="course_type" id="" class="form-control">
                                            <label for="">hello</label>
                                            <option value="0">Course Type</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="university" id="" class="form-control">
                                            <option value="0">University</option>
                                            @foreach($universities as $university)
                                                <option value="{{$university->id}}">{{$university->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <input type="submit" class="search-submit btn btn-primary" value="Search">
                            </form>
                            {{--                            <p class="text-center mb-5">We have more than 500 courses to improve your skills</p>--}}
                            {{--                            <p class="text-center"><a href="#" class="btn py-3 px-5">Register Now</a></p>--}}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-12 order-md-2">

                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col-md-12 col-lg-12 mb-5">
                                <div class="block-19">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('universities.show',$course->university->id)}}"><img
                                                    src="{{$course->university->imagePath()}}" alt="Image"
                                                    class="img-fluid mt-3 ml-3"></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text">
                                                <h2 class="heading mt-4">
                                                    {{$course->university->name}}
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="text">
                                                <div class="heading mt-3">
                                                    <div class="float-right">
                                                        <a href="{{route('courses.show',$course->id)}}"
                                                           class="btn btn-primary" style="color: white;">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="heading ml-3">{{$course->name}}</h2>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Course Type</h6>
                                                        <h2 class="heading">{{$course->type->name}}</h2>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Tuition Fees</h6>
                                                        <h2 class="heading">{{$course->fees}}</h2>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <h6 class="heading">Duration</h6>
                                                        <h2 class="heading">{{$course->duration}} {{$course->duration > 1 ?"Months": 'Month'}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <div class="block-27">
                                {{$courses->links()}}
                            </div>
                        </div>
                    </div>
                </div>

                {{--                side bar--}}
                <div class="col-md-4 col-sm-12 order-md-1">

                    <div class="block-24 mb-5">
                        <h3 class="heading">Course Types</h3>
                        <ul>
                            @foreach($types as $type)
                                <li><a href="/courses?type={{$type->id}}">{{$type->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>

{{--                    <div class="block-25 mb-5">--}}
{{--                        <div class="heading">Recent Courses</div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="d-flex">--}}
{{--                                    <figure class="image mr-3">--}}
{{--                                        <img src="images/img_2_b.jpg" alt="" class="img-fluid">--}}
{{--                                    </figure>--}}
{{--                                    <div class="text">--}}
{{--                                        <h3 class="heading">Create cool websites using this template</h3>--}}
{{--                                        <span class="meta">$34</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="d-flex">--}}
{{--                                    <figure class="image mr-3">--}}
{{--                                        <img src="images/img_2_b.jpg" alt="" class="img-fluid">--}}
{{--                                    </figure>--}}
{{--                                    <div class="text">--}}
{{--                                        <h3 class="heading">Create cool websites using this template</h3>--}}
{{--                                        <span class="meta">$34</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#" class="d-flex">--}}
{{--                                    <figure class="image mr-3">--}}
{{--                                        <img src="images/img_2_b.jpg" alt="" class="img-fluid">--}}
{{--                                    </figure>--}}
{{--                                    <div class="text">--}}
{{--                                        <h3 class="heading">Create cool websites using this template</h3>--}}
{{--                                        <span class="meta">$34</span>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

{{--                    <div class="block-26">--}}
{{--                        <h3 class="heading">Tags</h3>--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">code</a></li>--}}
{{--                            <li><a href="#">design</a></li>--}}
{{--                            <li><a href="#">typography</a></li>--}}
{{--                            <li><a href="#">development</a></li>--}}
{{--                            <li><a href="#">creative</a></li>--}}
{{--                            <li><a href="#">codehack</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}


                </div>
                {{--                endside bar--}}
            </div>
        </div>
    </div>






@endsection


@section('scripts')

@endsection
