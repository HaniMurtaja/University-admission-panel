@extends('layouts.home_layout')

@section('title','Universities')

@section('assets')


@endsection

@section('content')
    <section class="site-hero site-sm-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url({{asset('assets2/images/big_image_2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-sm-inner">
                <div class="col-md-7 text-center">

                    <div class="mb-5 element-animate">
                        <h1 class="mb-2">Universities</h1>
                        <p class="bcrumb"><a href="{{route('home')}}">Home</a> <span
                                class="sep ion-android-arrow-dropright px-2"></span> <span
                                class="current">Universities</span></p>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12 order-md-2">

                    <div class="row">
                        @foreach($universities as $university)
                            <div class="col-md-12 col-lg-12 mb-5">
                                <div class="block-19">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('universities.show',$university->id)}}"><img
                                                    src="{{$university->imagePath()}}" alt="Image"
                                                    class="img-fluid mt-3 ml-3"></a>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="text">
                                                <h2 class="heading mt-4">
                                                    {{$university->name}}
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="text">
                                                <div class="heading mt-3">
                                                    <div class="float-right">
                                                        <a href="{{route('universities.show',$university->id)}}"
                                                           class="btn btn-primary" style="color: white;">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="float-right">
                                                <a href="{{$university->website}}" class="mr-5">{{$university->website}}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="text">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="heading">Institution Type</h6>
                                                        <h2 class="heading">{{$university->institution_type}}</h2>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h6 class="heading">Founding Year</h6>
                                                        <h2 class="heading">{{$university->founding_year}}</h2>
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
                                {{$universities->links()}}
                            </div>
                        </div>
                    </div>
                </div>

                {{--                side bar--}}
                <div class="col-md-4 col-sm-12 order-md-1">

{{--                    <div class="block-24 mb-5">--}}
{{--                        <h3 class="heading">Course Types</h3>--}}
{{--                        <ul>--}}
{{--                            @foreach($types as $type)--}}
{{--                                <li><a href="/courses?type={{$type->id}}">{{$type->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
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
