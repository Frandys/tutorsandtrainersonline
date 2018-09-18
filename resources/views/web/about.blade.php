@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'About view')
<section class="inner-page-title">
	<div class="container">
		<h2>{{$about->title}}</h2>
	</div>
</section>
<section id="about-main">
	<div class="container">
        <?php print_r($about->description); ?>
	</div>
</section>
@include('includes.middle_section')
@stop
