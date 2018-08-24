@extends('layouts.plane')
@section('body')
    <header class="main-head clearHeader">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="#"><img class="d-block w-100" src="{{asset('web/images/logo.png')}}" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav justify-content-end w-100">
                        <li class="nav-item active"><a class="nav-link" href="">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Prices</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="">More</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Contact Us</a></li>
                    </ul>
                </div>
                <div class="right-section d-none d-lg-block">
                    <ul class="">
                        <li class="tutor">
                            <a href="{{url('register/tutor')}}"><span>For Tutor</span></a>
                        </li>
                        <li class="employer">
                            <a href="{{url('register/employer')}}"><span>For Employer</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
  @yield('section')

@stop

