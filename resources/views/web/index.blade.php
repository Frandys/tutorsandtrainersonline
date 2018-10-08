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
                    <div class="col-sm-8 col-8">
                        <h3>For Tutor</h3>
                    </div>
                    <div class="col-sm-4 col-4">
                        <img src="web/images/icon-4.png" class="img-fluid">
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
                    <div class="col-sm-8 col-8">
                        <h3>For Employer</h3>
                    </div>
                    <div class="col-sm-4 col-4">
                        <img src="web/images/icon-3.png" class="img-fluid">
                    </div>
                </div>
                <div class="text-wrap">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud...</p>
                    <a class="round-button" href="{{url('pricing')}}"><span>Sign Up</span><i
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
                    <h2>{{$about->title}}</h2>
                    <h2>Tutors and Trainers Online</h2>
                    <p> <?php  print_r( \Illuminate\Support\Str::words($about->shot, 80,'....') ); ?></p>
                    <a class="semi-round" href="{{url('about')}}"><span>Learn More</span><i
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
            @php $i = '1'  @endphp
            @foreach($categories as  $key=>$categorieItem)
                @if(isset($categorieItem->children['0']))
                    <div class="col-md-4 health">
                        <a href="{{url('tutors')."?subcat=".encrypt($categorieItem->id)}}"
                           class="text-wrap text-center">
                            <img src="web/images/special-{{$i}}.png" class="img-fluid">
                            <p>{{$categorieItem->name}}</p>
                        </a>
                    </div>
                    @php $i++;  @endphp
                @endif
            @endforeach
        </div>
    </div>
</section>
@include('includes.middle_section')
@stop