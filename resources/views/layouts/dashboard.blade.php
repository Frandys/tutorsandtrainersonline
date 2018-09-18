@extends('layouts.plane')
@section('body')
    <header class="main-head clearHeader">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand" href="{{url('/')}}"><img class="d-block w-100"
                                                                 src="{{asset('web/images/logo.png')}}"
                                                                 alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                        aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav justify-content-end w-100">
                        <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('about')}}">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('pricing')}}">Prices</a></li>
                        <li class="nav-item"><a class="nav-link" href="">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('faq')}}">Faq</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{url('contact-us')}}">Contact Us</a></li>
                    </ul>
                </div>
                <div class="right-section d-none d-lg-block">
                    <ul class="">

                        @if (!empty(\Sentinel::check()))
                            <li class="employer dropdown">
                                <a class="" href="#" id="navbardrop"
                                   data-toggle="dropdown"><span>{{\Sentinel::getUser()->first_name}} {{\Sentinel::getUser()->last_name}}</span></a>

                                <div class="dropdown-menu">
                                    @if ($user = Sentinel::getUser())
                                        @if ($user->inRole('tutor'))
                                            <a class="dropdown-item" href="{{url('tutor')}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{url('tutor').'/'.encrypt($user->id).'/edit'}}">Profile</a>
                                            <a class="dropdown-item" href="{{url('tutor/change_password')}}">Change Password</a>
                                        @else
                                            <a class="dropdown-item" href="{{url('employer')}}">Dashboard</a>
                                            <a class="dropdown-item" href="{{url('employer').'/'.encrypt($user->id).'/edit'}}">Profile</a>
                                            <a class="dropdown-item" href="{{url('employer/change_password')}}">Change Password</a>
                                        @endif
                                    @endif


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>

                        @else
                        <!--<li class="tutor dropdown">
							<a href="{{url('register/tutor')}}"><span>For Tutor</span></a>
						</li>-->
                            <li class="tutor dropdown">
                                <a class="" href="#" id="navbardrop" data-toggle="dropdown"><span>For Tutor</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('login')}}">Login</a>
                                    <a class="dropdown-item" href="{{url('tutor_type')}}">Register</a>
                                </div>
                            </li>
                            <li class="employer dropdown">
                                <a class="" href="#" id="navbardrop"
                                   data-toggle="dropdown"><span>For Employer</span></a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{url('login')}}">Login</a>
                                    <a class="dropdown-item" href="{{url('pricing')}}">Register</a>
                                </div>
                            </li>

                        <!--<li class="employer">
							<a href="{{url('register/employer')}}"><span>For Employer</span></a>
						</li>-->
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('section')

@stop

