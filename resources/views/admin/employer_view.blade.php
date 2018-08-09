@extends('layouts.admin.dashboard')
@section('page_heading','View Employer')
@section('section')
    @include('message.message')
    <div class="row">
        <div class="col-sm-6">
            <h1>User Data</h1>
            <h2>first_name</h2>
            <p>{{$usersMeta->first_name}}</p>
            <h2>last_name</h2>
            <p>{{$usersMeta->last_name}}</p>
            <img style="width: 30%" src="{{asset('images/photo/'.$usersMeta->photo)}}">
            <h2>phone</h2>
            <p>{{$usersMeta->phone}}</p>
        </div>

        <div class="col-sm-6">
            <h2>company_logo</h2>
            <img style="width: 30%" src="{{asset('images/company_logo/'.$usersMeta->employer_profile->company_logo)}}">
             <h2>company_name</h2>
            <p>{{$usersMeta->employer_profile->company_name}}</p>
            <h2>company_address</h2>
            <p>{{$usersMeta->employer_profile->company_address}}</p>
            <h2>contact_tel</h2>
            <p>{{$usersMeta->employer_profile->contact_tel}}</p>
            <h2>head_office_address</h2>
            <p>{{$usersMeta->employer_profile->head_office_address}}</p>
            <h2>authorised_user</h2>
            <p>{{$usersMeta->employer_profile->authorised_user}}</p>
            <h2>authorised_user_second</h2>
            <p>{{$usersMeta->employer_profile->authorised_user_second}}</p>
            <h2>contact_person</h2>
            <p>{{$usersMeta->employer_profile->contact_person}}</p>
            <h2>head_office_contact_person</h2>
            <p>{{$usersMeta->employer_profile->head_office_contact_person}}</p>
            <h2>contact_person_second</h2>
            <p>{{$usersMeta->employer_profile->contact_person_second}}</p>
            <h2>head_office_contact_person_second</h2>
            <p>{{$usersMeta->employer_profile->head_office_contact_person_second}}</p>
            <h2>dept</h2>
            <p>{{$usersMeta->employer_profile->dept}}</p>
            <h2>dept_second</h2>
            <p>{{$usersMeta->employer_profile->dept_second}}</p>
            <h2>contact_no</h2>
            <p>{{$usersMeta->employer_profile->dept_second}}</p>
            <h2>contact_no_second</h2>
            <p>{{$usersMeta->employer_profile->contact_no_second}}</p>
            <h2>email</h2>
            <p>{{$usersMeta->employer_profile->email}}</p>
            <h2>email_second</h2>
            <p>{{$usersMeta->employer_profile->email_second}}</p>
            <h2>company_reg_no</h2>
            <p>{{$usersMeta->employer_profile->company_reg_no}}</p>
            <h2>different_locations</h2>
            @if($usersMeta->employer_profile->different_locations == '1')
            <h1>Address</h1>
            <p>{{$usersMeta->employer_profile->address}}</p>
            <h2>city</h2>
            <p>{{$usersMeta->employer_profile->city}}</p>
            <h2>state</h2>
            <p>{{$usersMeta->employer_profile->state}}</p>
            <h2>Country</h2>
            <p>{{$usersMeta->country_employer['0']->name}}</p>
            <h2>Zip</h2>
            <p>{{$usersMeta->employer_profile->zip}}</p>
            @endif
            <h2>onsite_projector</h2>
            <p>{{$usersMeta->employer_profile->onsite_projector == '1' ? 'YES' : 'NO'}}</p>
             <h2>wipe_board</h2>
            <p>{{$usersMeta->employer_profile->wipe_board == '1' ? 'YES' : 'NO'}}</p>
            <h2>flip_chart_and_stand</h2>
            <p>{{$usersMeta->employer_profile->flip_chart_and_stand == '1' ? 'YES' : 'NO'}}</p>
            <h2>disabilities</h2>
            <p>{{$usersMeta->employer_profile->disabilities == '1' ? 'YES' : 'NO'}}</p>
            <h2>equipment_available</h2>
            <p>{{$usersMeta->employer_profile->equipment_available == '1' ? 'YES' : 'NO'}}</p>
            <h2>equipment_available_onsite</h2>
            <p>{{$usersMeta->employer_profile->equipment_available_onsite == '1' ? 'YES' : 'NO'}}</p>
             <h2>report_name</h2>
            <p>{{$usersMeta->employer_profile->report_name}}</p>
            <h2>report_department</h2>
            <p>{{$usersMeta->employer_profile->report_department}}</p>
            <h2>company_vat_reg_no</h2>
            <p>{{$usersMeta->employer_profile->company_vat_reg_no}}</p>
            <h2>additional_information</h2>
            <p>{{$usersMeta->employer_profile->additional_information}}</p>
            <h2>additional_details</h2>
            <p>{{$usersMeta->employer_profile->additional_details}}</p>

        </div>

    </div>

@stop
