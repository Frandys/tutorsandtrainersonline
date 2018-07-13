@extends('layouts.admin.dashboard')
@section('page_heading','Edit Tutor')
@section('section')
    @include('message.message')
    <div class="row">
        <div class="col-sm-6">

            <h1>User Data</h1>
            <h2>first_name</h2>
            <p>{{$usersMeta->first_name}}</p>
            <h2>last_name</h2>
            <p>{{$usersMeta->last_name}}</p>
            <img style="width: 30%" src="{{asset('images/users/'.$usersMeta->photo)}}">
            <h2>phone</h2>
            <p>{{$usersMeta->phone}}</p>
        </div>

        <div class="col-sm-6">
            @if(isset($usersMeta->tutor_profile))
                <h1>Address</h1>
                <p>{{$usersMeta->tutor_profile->address}}</p>
                <h2>city</h2>
                <p>{{$usersMeta->tutor_profile->city}}</p>
                <h2>state</h2>
                <p>{{$usersMeta->tutor_profile->state}}</p>
                <h2>certification_id</h2>
                <p>{{$usersMeta->tutor_profile->certification_id}}</p>
                <h2>certification_id</h2>
                <p>{{$usersMeta->tutor_profile->resume}}</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h1>Education</h1>
            @foreach($usersMeta->educations as $education)
                <h2>title</h2>
                <p>{{$education->title}}</p>
                <h2>university</h2>
                <p>{{$education->university}}</p>
                <h2>complete</h2>
                <p>{{$education->complete}}</p>
                <hr>
            @endforeach

        </div>

        <div class="col-sm-6">
            <h1>work_experience</h1>

            @foreach($usersMeta->work_experiences as $work_experience)
                <h2>organization</h2>
                <p>{{$work_experience->organization}}</p>
                <h2>designation</h2>
                <p>{{$work_experience->designation}}</p>
                <h2>from</h2>
                <p>{{$work_experience->from}}</p>
                <h2>to</h2>
                <p>{{$work_experience->to}}</p>
                <h2>location</h2>
                <p>{{$work_experience->location}}</p>
                <hr>
            @endforeach
        </div>
    </div>


    <div class="row">
        <div class="col-sm-6">
            <h1>Language
                @if($ttrLan != '')
                    @foreach($ttrLan as $lang)
                        <p>{{$lang->name}}</p>
                        <hr>
            @endforeach
            @endif
        </div>

        <div class="col-sm-6">
            <h1>Skil</h1>
            @if($ttrSkil != '')
                @foreach($ttrSkil as $skill)
                    <p>{{$skill->name}}</p>
                    <hr>
                @endforeach
            @endif
        </div>

@stop
