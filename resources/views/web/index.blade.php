@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Home')
<section id="home-banner" class="text-center">
    <div class="container">
        <div class="form-wrap">
            <h1>Find A...<i class="fas fa-angle-down"></i></h1>
            @include('includes.search_form')
            <p>Lorem ipsum dolor sit amet, consectetur cing elit Proin convallis nisl turpis, </p>
        </div>
    </div>
</section>
<section id="tutor-area">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 tutors">
                <div class="row heading">
                    <div class="col-sm-8">
                        <h3>For Tutor</h3>
                    </div>
                    <div class="col-sm-4">
                        <img src="web/images/icon-3.png" class="img-fluid">
                    </div>
                </div>
                <div class="text-wrap">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...</p>
                    <a class="round-button" href="{{url('register/tutor')}}"><span>Sign Up</span><i
                                class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 employees">
                <div class="row heading">
                    <div class="col-sm-8">
                        <h3>For Employer</h3>
                    </div>
                    <div class="col-sm-4">
                        <img src="web/images/icon-3.png" class="img-fluid">
                    </div>
                </div>
                <div class="text-wrap">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...</p>
                    <a class="round-button" href="{{url('register/employer')}}"><span>Sign Up</span><i
                                class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="text-wrap">
                    <strong>About Us</strong>
                    <h2>Tutors and Trainers Online</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
                    <a class="semi-round" href=""><span>Learn More</span><i
                                class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="col-md-7">
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <div class="img-wrap big">
                            <img src="web/images/image-1.png" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="img-wrap small one">
                            <img src="web/images/image-2.png" class="img-fluid">
                        </div>
                        <div class="img-wrap small two">
                            <img src="web/images/image-2.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="book">
    <div class="container">
        <div class="text-center heading">
            <h2>Book a Tutor</h2>
            <p>Lorem ipsum dolor sit amet</p>
        </div>
        <div class="row book-list">
            @foreach($categories as  $categorieItem)
                @if(isset($categorieItem->children['0']))
                    <div class="col-md-4 health">
                        <a href="{{url('tutors')."?subcat=".encrypt($categorieItem->id)}}"
                           class="text-wrap text-center">
                            <img src="web/images/special-6.png" class="img-fluid">
                            <p>{{$categorieItem->name}}</p>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
<section id="counter-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 tour">
                <div class="text-wrap">
                    <i class="fas fa-users"></i>
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='500'
                         data-delay='1' data-increment="1">0
                    </div>
                    <p>Available Tour</p>
                </div>
            </div>
            <div class="col-md-3 tutors">
                <div class="text-wrap">
                    <i class="fas fa-trophy"></i>
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1223'
                         data-delay='1' data-increment="5">0
                    </div>
                    <p>Tutors Booked</p>
                </div>
            </div>
            <div class="col-md-3  teachers">
                <div class="text-wrap">
                    <i class="far fa-gem"></i>
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1290'
                         data-delay='1' data-increment="5">0
                    </div>
                    <p>Certified Teachers</p>
                </div>
            </div>
            <div class="col-md-3 labs">
                <div class="text-wrap">
                    <i class="fas fa-flask"></i>
                    <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='1910'
                         data-delay='1' data-increment="10">0
                    </div>
                    <p>Library and Labs</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="principal-words">
    <div class="container">
        <h2 class="slide-header text-center">Message from principal</h2>
        <div class="textimonial-wrap">
            <div id="owl-test" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="testi-wrap">
                        <div class="text text-center">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="web/images/team.jpg" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-wrap">
                                        <h3>John Doe</h3>
                                        <p>Graphics Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi-wrap">
                        <div class="text text-center">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="web/images/team.jpg" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-wrap">
                                        <h3>John Doe</h3>
                                        <p>Graphics Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi-wrap ">
                        <div class="text text-center">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="web/images/team.jpg" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-wrap">
                                        <h3>John Doe</h3>
                                        <p>Graphics Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop