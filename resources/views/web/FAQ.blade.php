@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'FAQs view')
<section class="inner-page-title">
    <div class="container">
        <h2>FAQs</h2>
    </div>
</section>

<section id="faq-main">
    <div class="container">
        <div class="section-heading text-center anim d06 t24 fadeInUp">
            <h1>Frequently Asked Questions</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquam a libero non porttitor. Maecenas sit
                amet libero id est dignissim ornare. Integer sagittis, elit ut rhoncus lacinia, enim diam semper
                dolor</p>
        </div>

        <div id="accordion" class="accordion">
            <div class="card mb-0">
                @foreach($faqs as  $key=>$faq)
                    <div class="card-header collapsed" data-toggle="collapse" href="#{{$key}}">
                        <a class="card-title">
                            {{$faq->title}}
                        </a>
                    </div>
                    <div id="{{$key}}" class="card-body collapse" data-parent="#accordion">
                        <p>
                            {{$faq->description}}
                        </p>
                    </div>
                @endforeach
            </div>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="images/team.jpg" class="img-fluid">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="images/team.jpg" class="img-fluid">
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div class="profile-mata">
                            <div class="row no-gutters">
                                <div class="col-sm-4">
                                    <div class="image-wrap">
                                        <img src="images/team.jpg" class="img-fluid">
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