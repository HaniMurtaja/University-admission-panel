@extends('layouts.home_layout')

@section('title',$university->name)

@section('content')
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url({{asset('assets2/images/big_image_2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">

                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">{{$university->name}}</h1>
                        <p class="bcrumb"><a href="{{route('home')}}">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span> <a
                                href="{{route('universities')}}">Universities</a>
                            <span class="sep ion-android-arrow-dropright px-2"></span> <span
                                class="current">{{$university->name}}</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <div class="site-section bg-light element-animate">
        <div class="container">

            <div class="row">

                <div class="col-md-4 order-md-1">

                    <div class="block-29 mb-5">
                        <h2 class="heading">University Details</h2>
                        <ul>
                            <li><span class="text-1">University Name : </span> <span
                                    class="text-2">{{$university->name}}</span>
                            </li>
                            <li><span class="text-1">Number of Courses : </span> <span
                                    class="text-2">{{count($university->courses)}}</span></li>
                            <li><span class="text-1">Institution Type : </span> <span
                                    class="text-2">{{$university->institution_type}}</span></li>
                            <li><span class="text-1">Founding Year : </span> <span
                                    class="text-2">{{$university->founding_year}}</span></li>
                            <li><span class="text-1">Website : </span> <span
                                    class="text-2"><a
                                        href="{{$university->website}}" target="_blank" class="link">{{$university->website}}</a></span>
                            </li>
                        </ul>
                    </div>

                    {{--                    <div class="block-28 text-center mb-5">--}}
                    {{--                        <figure>--}}
                    {{--                            <img src="images/person_3.jpg" alt="" class="img-fluid">--}}
                    {{--                        </figure>--}}
                    {{--                        <h2 class="heading">Mark Stewart</h2>--}}
                    {{--                        <h3 class="subheading">JavaScript Ninja</h3>--}}
                    {{--                        <p>--}}
                    {{--                            <a href="#" class="fa fa-twitter p-2"></a>--}}
                    {{--                            <a href="#" class="fa fa-facebook p-2"></a>--}}
                    {{--                            <a href="#" class="fa fa-linkedin p-2"></a>--}}
                    {{--                        </p>--}}
                    {{--                        <p>Hi I'm Mark Stewart, consectetur adipisicing elit. Quibusdam nulla beatae modi itaque nemo--}}
                    {{--                            magni molestiae explicabo sint dolorum cum! Nam iste eligendi autem voluptates illo--}}
                    {{--                            veritatis veniam laudantium enim!</p>--}}

                    {{--                    </div>--}}

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


                    {{--                    <div class="block-24 mb-5">--}}
                    {{--                        <h3 class="heading">Categories</h3>--}}
                    {{--                        <ul>--}}
                    {{--                            <li><a href="#">Laravel <span>10</span></a></li>--}}
                    {{--                            <li><a href="#">PHP <span>43</span></a></li>--}}
                    {{--                            <li><a href="#">JavaScript <span>21</span></a></li>--}}
                    {{--                            <li><a href="#">Python <span>65</span></a></li>--}}
                    {{--                            <li><a href="#">iOS <span>34</span></a></li>--}}
                    {{--                            <li><a href="#">Android <span>45</span></a></li>--}}
                    {{--                            <li><a href="#">Swift <span>22</span></a></li>--}}
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
                <div class="col-md-8 order-md-2 mb-5">
                    <div class="row">
                        <div class="col-md-12 text-center mb-5">
                            <img src="{{$university->imagePath()}}" alt="" class="img-fluid">
                        </div>
                    </div>

                    <section class="episodes">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-md-12 pt-5">
                                    <h2>About</h2>
                                    <p>{{$university->about}}</p>
                                </div>
                            </div>
                        </div>

                        {{--                        <div class="container">--}}
                        {{--                            <div class="row">--}}
                        {{--                                <div class="col-md-12 mb-2">--}}
                        {{--                                    <h2>Lesson</h2>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="row bg-light align-items-center p-4 episode">--}}
                        {{--                                <div class="col-md-10">--}}
                        {{--                                    <p class="meta">Episode 1 <a href="#">Runtime 2:53</a></p>--}}
                        {{--                                    <h2><a href="#">Some Title Here For The Video</a></h2>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit!</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 text-center">--}}
                        {{--                                    <a href="#" class="play"><span class="ion-ios-play"></span></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="row align-items-center p-4 episode">--}}
                        {{--                                <div class="col-md-10">--}}
                        {{--                                    <p class="meta">Episode 2 <a href="#">Runtime 5:12</a></p>--}}
                        {{--                                    <h2><a href="#">Some Title Here For The Video</a></h2>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit!</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 text-center">--}}
                        {{--                                    <a href="#" class="play"><span class="ion-ios-play"></span></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="row bg-light align-items-center p-4 episode">--}}
                        {{--                                <div class="col-md-10">--}}
                        {{--                                    <p class="meta">Episode 3 <a href="#">Runtime 5:12</a></p>--}}
                        {{--                                    <h2><a href="#">Some Title Here For The Video</a></h2>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit!</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 text-center">--}}
                        {{--                                    <a href="#" class="play"><span class="ion-ios-play"></span></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="row align-items-center p-4 episode">--}}
                        {{--                                <div class="col-md-10">--}}
                        {{--                                    <p class="meta">Episode 4 <a href="#">Runtime 6:55</a></p>--}}
                        {{--                                    <h2><a href="#">Some Title Here For The Video</a></h2>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit!</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 text-center">--}}
                        {{--                                    <a href="#" class="play"><span class="ion-ios-play"></span></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="row bg-light align-items-center p-4 episode">--}}
                        {{--                                <div class="col-md-10">--}}
                        {{--                                    <p class="meta">Episode 5 <a href="#">Runtime 14:33</a></p>--}}
                        {{--                                    <h2><a href="#">Some Title Here For The Video</a></h2>--}}
                        {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, fugit!</p>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="col-md-2 text-center">--}}
                        {{--                                    <a href="#" class="play"><span class="ion-ios-play"></span></a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                    </section>
                </div>

            </div>

            <h1>University Courses</h1>
            <br>
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-6 mb-5">
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
                                                   class="btn btn-primary mr-4" style="color: white;">Details</a>
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
        </div>
    </div>

{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}
{{--            <div class="row justify-content-center mb-5 element-animate">--}}
{{--                <div class="col-md-7 text-left section-heading">--}}
{{--                    <h2 class="text-primary heading">You May Also Like</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="container-fluid block-11 element-animate">--}}
{{--            <div class="nonloop-block-11 owl-carousel">--}}

{{--                @foreach($sameCourses as $course)--}}
{{--                    <div class="item">--}}
{{--                        <div class="block-19">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-3">--}}
{{--                                    <a href="{{route('universities.show',$course->university->id)}}"><img--}}
{{--                                            src="{{$course->university->imagePath()}}" alt="Image"--}}
{{--                                            class="img-fluid mt-3 ml-3"></a>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <div class="text">--}}
{{--                                        <h2 class="heading mt-4">--}}
{{--                                            {{$course->university->name}}--}}
{{--                                        </h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-1">--}}
{{--                                    <div class="text">--}}
{{--                                        <div class="heading mt-3">--}}
{{--                                            <div class="float-right mr-4">--}}
{{--                                                <a href="{{route('courses.show',$course->id)}}"--}}
{{--                                                   class="btn btn-primary" style="color: white;">Details</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <h2 class="heading ml-3">{{$course->name}}</h2>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="text">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-sm-4">--}}
{{--                                                <h6 class="heading">Course Type</h6>--}}
{{--                                                <h2 class="heading">{{$course->type->name}}</h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-4">--}}
{{--                                                <h6 class="heading">Tuition Fees</h6>--}}
{{--                                                <h2 class="heading">{{$course->fees}}</h2>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-4">--}}
{{--                                                <h6 class="heading">Duration</h6>--}}
{{--                                                <h2 class="heading">{{$course->duration}} {{$course->duration > 1 ?"Months": 'Month'}}</h2>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
@endsection
