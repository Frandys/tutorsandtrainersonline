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
@include('includes.middle_section')
@stop