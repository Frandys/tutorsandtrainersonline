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

{{--<!-- ############################################################################# -->--}}
{{--<!-- Examples--}}
{{--<!-- ############################################################################# -->--}}
{{--<link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css" />--}}
{{--<link rel="stylesheet" media="all" type="text/css" href="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css" />--}}

{{--<div class="example-container">--}}
    {{--<p>Timepicker also includes some shortcut methods for ranges:</p>--}}
    {{--<div>--}}
        {{--<input type="text" name="range_example_2_start" id="range_example_2_start" value="" />--}}
        {{--<input type="text" name="range_example_2_end" id="range_example_2_end" value="" />--}}
    {{--</div>--}}

{{--@push('scripts')--}}

    {{--<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    {{--<script type="text/javascript" src="http://code.jquery.com/ui/1.11.0/jquery-ui.min.js"></script>--}}
    {{--<script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>--}}
    {{--<script type="text/javascript" src="http://trentrichardson.com/examples/timepicker/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>--}}

    {{--<script>--}}
        {{--var dateToday = new Date();--}}
        {{--var startDateTextBox = $('#range_example_2_start');--}}
        {{--var endDateTextBox = $('#range_example_2_end');--}}
        {{--$.timepicker.datetimeRange(--}}
            {{--startDateTextBox,--}}
            {{--endDateTextBox,--}}
            {{--{--}}
                {{--minInterval: (1000*60*60), // 1hr--}}
                {{--minDate: dateToday,--}}
                {{--dateFormat: 'dd M yy',--}}
                {{--timeFormat: 'HH:mm',--}}
                {{--start: {}, // start picker options--}}
                {{--end: {} // end picker options--}}
            {{--}--}}
        {{--);--}}
    {{--</script>--}}

{{--@endpush--}}

@stop