@extends('layouts.admin.dashboard')
@section('page_heading','View Tutor')
@section('section')

    <div class="step-form">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1>Professional Partner</h1>
                <div id='progress'>
                    <div id='progress-complete'></div>
                </div>

                {{ Form::model($usersMeta, array('route' => array('tutor.update', \encrypt($usersMeta->id)),'id' => 'msform','enctype'=>'multipart/form-data','files' => true,'method' => 'PUT') ) }}
                @include('includes.tutor_form')
                {{--</form>--}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>

    @push('scripts')

        <script src="{{ asset("js/admin/formtowizard.js") }}" type="text/javascript"></script>
        <script src="{{ asset("js/admin/bootstrap-multiselect.js") }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ asset("css/bootstrap-multiselect.css") }}"/>
        <script src="{{ asset("js/admin/tutor_certificates.js") }}" type="text/javascript"></script>
        <script src="{{ asset("js/admin/tutor_work.js") }}" type="text/javascript"></script>
        <script> $("#czContainer").czMore();</script>
        <script> $("#czContainerWork").czMores();</script>
        <script>
            $('#disciplines').multiselect({
                nonSelectedText: 'Select type',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '500px'
            });
        </script>
    @endpush
@stop
