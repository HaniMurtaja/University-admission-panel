@extends('layouts.home_layout')

@section('title','Home')

@section('assets')


@endsection

@section('content')
    <section class="site-hero overlay" data-stellar-background-ratio="0.5"
             style="background-image: url({{asset('assets2/images/big_image_2.jpg')}});">
        <div class="container">
            <div class="row align-items-center justify-content-center site-hero-inner">
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
                                            @foreach($course_types as $type)
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
@endsection

@section('scripts')

@endsection
