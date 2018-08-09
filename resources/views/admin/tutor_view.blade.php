@extends('layouts.admin.dashboard')
@section('page_heading','Edit Tutor')
@section('section')
    @include('message.message')
    <div class="view-page">
        <div class="row">
            <div class="col-sm-6">
                <div class="data-part">
                    <div class="out-wrap">
                        <p><strong>First Name:</strong><span>{{$usersMeta->first_name}}</span></p>
                    </div>
                    <div class="out-wrap">
                        <h2></h2>
                        <p><strong>Last Name:</strong>
                        <span>{{$usersMeta->last_name}}</span></p>
                    </div>
                    <div class="out-wrap">
                        <img style="width: 30%" src="{{asset('images/users/'.$usersMeta->photo)}}">
                        <h2>Phone</h2>
                        <p>{{$usersMeta->phone}}</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="data-part">
                    <div class="out-wrap">
                        <h2>Address</h2>
                        <p>{{$usersMeta->tutor_profile->address}}</p>
                    </div>
                    <div class="out-wrap">
                        <h2>City</h2>
                        <p>{{$usersMeta->tutor_profile->city}}</p>
                    </div>
                    <div class="out-wrap">
                        <h2>State</h2>
                        <p>{{$usersMeta->tutor_profile->state}}</p>
                    </div>
                    <div class="out-wrap">
                        <h2>Country</h2>
                        <p>{{$usersMeta->country['0']->name}}</p>
                    </div>
                    <div class="out-wrap">
                        <h2>Zip</h2>
                        <p>{{$usersMeta->tutor_profile->zip}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="data-part">
                    <div class="out-wrap">
                    <h2>Full UK Driving License?</h2>
                    <p>{{$usersMeta->tutor_profile->driving_license == '1' ? 'YES' : 'NO'}}</p>
                    </div>
                    <div class="out-wrap">
                    <h2>Are you willing to Travel?</h2>
                    <p>{{$usersMeta->tutor_profile->willing_travel == '1' ? 'YES' : 'NO'}}</p>
                    </div>
                    <div class="out-wrap">
                    <h2>Do you have the right to work in the UK? </h2>
                    <p>{{$usersMeta->tutor_profile->work_in_uk == '1' ? 'YES' : 'NO'}}</p>
                    </div><div class="out-wrap">
                    <h2>Do you speak any other languages?</h2>
                    <p>{{$usersMeta->tutor_profile->speak_languages == '1' ? 'YES' : 'NO'}}</p>
                    </div><div class="out-wrap">
                    <h2>Language</h2>
                    @foreach($ttrLan as $lang)
                    <p>{{$lang->name}}</p>
                
                    @endforeach

                    </div><div class="out-wrap">
                    <h2>Level of Fluency</h2>
                    <p>{{($usersMeta->tutor_profile->level_of_fluency == 0) ? "Basic understanding" : (($usersMeta->tutor_profile->level_of_fluency == 1)  ? "Semi-Fluent" : "Fluent")}}</p>
                    </div><div class="out-wrap">
                    <h2>Passport</h2>
                    <a download="{{$usersMeta->tutor_profile->passport}}"
                    href="{{asset('images/passport').'/'.$usersMeta->tutor_profile->passport}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->passport != '') ? 'Download' : ''}}
                    </a>
                    </div><div class="out-wrap">
                    <h2>Work Permit</h2>
                    <a download="{{$usersMeta->tutor_profile->work_permit}}"
                    href="{{asset('images/work_permit').'/'.$usersMeta->tutor_profile->work_permit}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->work_permit != '') ? 'Download' : ''}}
                    </a>
                    </div><div class="out-wrap">
                    <h2>Birth Certificate</h2>
                    <a download="{{$usersMeta->tutor_profile->birth_certificate}}"
                    href="{{asset('images/birth_certificate').'/'.$usersMeta->tutor_profile->birth_certificate}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->birth_certificate != '') ? 'Download' : ''}}
                    </a>

                    </div><div class="out-wrap">
                    <h2>Birth Certificate</h2>
                    <a download="{{$usersMeta->tutor_profile->birth_certificate}}"
                    href="{{asset('images/birth_certificate').'/'.$usersMeta->tutor_profile->birth_certificate}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->birth_certificate != '') ? 'Download' : ''}}
                    </a>
                    </div>
                        
                    <h2>Passport </h2>
                    <p>Permit No: {{$usersMeta->tutor_profile->passport_no}}</p>
                    <p>Permit Start Date: {{$usersMeta->tutor_profile->pass_start_date}}</p>
                    <p>Permit Expiry Date: {{$usersMeta->tutor_profile->pass_expiry_date}}</p>

                    <h2>Work Permit</h2>
                    <p>Permit No: {{$usersMeta->tutor_profile->permit_no}}</p>
                    <p>Permit Start Date: {{$usersMeta->tutor_profile->permit_start_date}}</p>
                    <p>Permit Expiry Date: {{$usersMeta->tutor_profile->permit_expiry_date}}</p>
                    <h2>Can you provide the certificates?</h2>
                    <p>{{$usersMeta->tutor_profile->certificates == '1' ? 'YES' : 'NO'}}</p>
                    <h2>Enter the date the Certificate was issued?</h2>
                    <p>{{$usersMeta->tutor_profile->certificate_issued}}</p>
                    <h2>Do you have a current DBS Cert?</h2>
                    <p>{{$usersMeta->tutor_profile->dbs_cert == '1' ? 'YES' : 'NO'}}</p>
                    <h2>Enter the date the Certificate was issued?</h2>
                    <p>{{$usersMeta->tutor_profile->cert_issued}}</p>
                    <h2>Did you register for the Internet Update Service?</h2>
                    <p>{{$usersMeta->tutor_profile->internet_update_service == '1' ? 'YES' : 'NO'}}</p>
                    <h2>If entered yes, please enter your DBS certificate no.</h2>
                    <p>{{$usersMeta->tutor_profile->dbs_certificate_no}}</p>
                    <h2>Do you have any disabilities?</h2>
                    <p>{{$usersMeta->tutor_profile->disabilities == '1' ? 'YES' : 'NO'}}</p>
                    <h2>Do you have any medical conditions that we need to be aware of?</h2>
                    <p>{{$usersMeta->tutor_profile->medical_conditions == '1' ? 'YES' : 'NO'}}</p>

                    <h2>CV</h2>
                    <a download="{{$usersMeta->tutor_profile->cv}}"
                    href="{{asset('images/cv').'/'.$usersMeta->tutor_profile->cv}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->cv != '') ? 'Download' : ''}}
                    </a>

                    <h2>Dbs Cert</h2>
                    <a download="{{$usersMeta->tutor_profile->dbs_cert_upload}}"
                    href="{{asset('images/dbs_cert').'/'.$usersMeta->tutor_profile->dbs_cert_upload}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->dbs_cert_upload != '') ? 'Download' : ''}}
                    </a>

                    <h2>Certificates</h2>
                    <a download="{{$usersMeta->tutor_profile->certificates_upload}}"
                    href="{{asset('images/certificates').'/'.$usersMeta->tutor_profile->certificates_upload}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->certificates_upload != '') ? 'Download' : ''}}
                    </a>

                    <h2>Teaching Qual</h2>
                    <a download="{{$usersMeta->tutor_profile->teaching_qual}}"
                    href="{{asset('images/teaching_qual').'/'.$usersMeta->tutor_profile->teaching_qual}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->teaching_qual != '') ? 'Download' : ''}}
                    </a>

                    <h2>Certificates</h2>
                    <a download="{{$usersMeta->tutor_profile->teaching_cert}}"
                    href="{{asset('images/teaching_cert').'/'.$usersMeta->tutor_profile->teaching_cert}}"
                    title="ImageName">
                        {{($usersMeta->tutor_profile->teaching_cert != '') ? 'Download' : ''}}
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="data-part">
                <h1>Organization</h1>
                    @if($usersMeta->organisations_work)
                        @foreach($usersMeta->organisations_work as $organisation)
                        <h2>Company name</h2>
                        <p>{{$organisation->company_name}}</p>
                        <h2>Registration</h2>
                        <p>{{$organisation->registration}}</p>
                        <hr>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="data-part">
                    <h1>Skills</h1>
                    @foreach($usersMeta->categories as $keyCat=>$categorie)
                    <h2>Skills name</h2>
                    <p>{{$categorie->name}}</p>
                    <h2>Qualified </h2>
                    <p>{{$usersMeta->qualified_level[$keyCat]->level}}</p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <h1>Willing Location
            @foreach($ttrLocaWill as $LocaWill)
                <p>{{$LocaWill->name}}</p>
                <hr>
        @endforeach
    </div>
    </div>
@stop
