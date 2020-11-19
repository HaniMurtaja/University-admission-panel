<!doctype html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets2/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets2/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/css/magnific-popup.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('assets2/css/style.css')}}">

    @yield('assets')

</head>
<body>

<header role="banner">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand absolute" href="{{route('home')}}">Universities</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('courses')}}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('universities')}}">Universities</a>
                    </li>
                    @canany(['show-students','show-universities','show-courses','show-course-types','show-course-categories','show-users','show-roles'])
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Control Panel</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @can('show-students')
                                    <a class="dropdown-item"
                                       href="{{route('admin.students.index')}}">Students</a>
                                @endcan
                                @can('show-universities')
                                    <a class="dropdown-item"
                                       href="{{route('admin.universities.index')}}">Universities</a>
                                @endcan

                                @can('show-courses')
                                    <a class="dropdown-item" href="{{route('admin.courses.index')}}">Courses</a>
                                @endcan

                                @can('show-course-types')
                                    <a class="dropdown-item" href="{{route('admin.course_types.index')}}">Course
                                        Types</a>
                                @endcan

                                @can('show-course-categories')
                                    <a class="dropdown-item" href="{{route('admin.categories.index')}}">Course
                                        Categories</a>
                                @endcan

                                @can('show-users')
                                    <a class="dropdown-item" href="{{route('admin.users.index')}}">Users</a>
                                @endcan

                                @can('show-roles')
                                    <a class="dropdown-item" href="{{route('admin.roles.index')}}">Roles</a>
                                @endcan
                            </div>
                        </li>

                    @endcan

                    {{--                    <li class="nav-item dropdown">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown"--}}
                    {{--                           aria-haspopup="true" aria-expanded="false">Categories</a>--}}
                    {{--                        <div class="dropdown-menu" aria-labelledby="dropdown05">--}}
                    {{--                            <a class="dropdown-item" href="#">HTML</a>--}}
                    {{--                            <a class="dropdown-item" href="#">WordPress</a>--}}
                    {{--                            <a class="dropdown-item" href="#">Laravel</a>--}}
                    {{--                            <a class="dropdown-item" href="#">JavaScript</a>--}}
                    {{--                            <a class="dropdown-item" href="#">Python</a>--}}
                    {{--                        </div>--}}

                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('selected_courses')}}">Selected Courses</a>
                    </li>
                </ul>
                <ul class="navbar-nav absolute-right">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
</header>
<!-- END header -->

@yield('content')

<div class="py-5 block-22">
    <div class="container">
        <div class="row align-items-center">

        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <h3>University</h3>
                <p>Find Courses That Suits You.</p>
            </div>
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <h3 class="heading">Quick Links</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('courses')}}">Courses</a></li>
                            <li><a href="{{route('universities')}}">Universities</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <h3 class="heading">Contact Information</h3>
                <div class="block-23">
                    <ul>
                        <li><span class="icon ion-android-pin"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span>
                        </li>
                        <li><a href="#"><span class="icon ion-ios-telephone"></span><span
                                    class="text">+2 392 3929 210</span></a></li>
                        <li><a href="#"><span class="icon ion-android-mail"></span><span class="text">info@yourdomain.com</span></a>
                        </li>
                        <li><span class="icon ion-android-time"></span><span class="text">Monday &mdash; Friday 8:00am - 5:00pm</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-md-12 text-center copyright">

                <p class="float-md-left">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | Built with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by
                    <a href="javascript:void(0);" class="text-primary">Hani Murtaja</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <p class="float-md-right">
                    <a href="#" class="fa fa-facebook p-2"></a>
                    <a href="#" class="fa fa-twitter p-2"></a>
                    <a href="#" class="fa fa-linkedin p-2"></a>
                    <a href="#" class="fa fa-instagram p-2"></a>
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- END footer -->

<!-- loader -->
<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#f4b214"/>
    </svg>
</div>

<script src="{{asset('assets2/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets2/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('assets2/js/popper.min.js')}}"></script>
<script src="{{asset('assets2/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets2/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets2/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets2/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets2/js/jquery.animateNumber.min.js')}}"></script>

<script src="{{asset('assets2/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('assets2/js/main.js')}}"></script>

<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/notifications.js')}}"></script>
@include('success_notification')


@yield('scripts')
</body>
</html>
