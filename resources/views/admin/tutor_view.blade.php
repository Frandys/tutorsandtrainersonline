@extends('layouts.admin.dashboard')
@section('page_heading','View Tutor')
@section('section')
    @include('message.message')
    <div class="row">
        <div class="col-sm-4">

            <h1>User Data</h1>
            <h2>first_name</h2>
            <p>{{$usersMeta->first_name}}</p>
            <h2>last_name</h2>
            <p>{{$usersMeta->last_name}}</p>
            <img style="width: 30%" src="{{asset('images/users/'.$usersMeta->photo)}}">
            <h2>phone</h2>
            <p>{{$usersMeta->phone}}</p>
        </div>

        <div class="col-sm-4">
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
        </div>

        <div class="col-sm-4">
            <?php print_r($usersMeta->tutor_profile); ?>
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
        </div>

    </div>

@stop
