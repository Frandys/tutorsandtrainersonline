@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Tutor view')
<section class="inner-page-title">
    <h2>{{$usersMeta->first_name}} {{$usersMeta->last_name}}</h2>
</section>

<section id="tutor-view">


    <div class="container">
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <div class="img-wrap">
                        <img class="img-fluid" src="{{asset('images/photo/'.$usersMeta->photo)}}">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <h2>{{$usersMeta->first_name}} {{$usersMeta->last_name}}</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Launch demo modal
                        </button>

                        <p>{{$usersMeta->tutor_profile->about}}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Personal Information</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Phone:</strong><span>{{$usersMeta->phone}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Address:</strong><span>{{$usersMeta->tutor_profile->address}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>City:</strong><span>{{$usersMeta->tutor_profile->city}}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>State:</strong><span>{{$usersMeta->tutor_profile->state}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Country:</strong><span>{{$usersMeta->country['0']->name}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Zip:</strong><span>{{$usersMeta->tutor_profile->zip}}</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Work Permit</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-wrap listing">
                                    <p><strong>Full UK Driving
                                            License?:</strong><span>{{$usersMeta->tutor_profile->driving_license == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-wrap listing">
                                    <p><strong>Are you willing to
                                            Travel?:</strong><span>{{$usersMeta->tutor_profile->willing_travel == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p><strong>Please select the locations willing to travel</strong>
                                        @foreach($ttrLocaWill as $LocaWill)
                                            <span class="multiple">{{$LocaWill->name}}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p><strong>Do you have the right to work in the
                                            UK?:</strong><span>{{$usersMeta->tutor_profile->driving_license == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Permit Details</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit No:</strong>
                                        <span>{{$usersMeta->tutor_profile->permit_no}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit Start Date:</strong>
                                        <span>{{$usersMeta->tutor_profile->permit_start_date}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit Expiry Date:</strong>
                                        <span>{{$usersMeta->tutor_profile->permit_expiry_date}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Languages</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Do you speak any other
                                            languages?:</strong><span>{{$usersMeta->tutor_profile->speak_languages == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Language:</strong>@foreach($ttrLan as $lang) <span
                                                class="multiple">{{$lang->name}}</span> @endforeach</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Level of
                                            Fluency:</strong><span>{{($usersMeta->tutor_profile->level_of_fluency == 0) ? "Basic understanding" : (($usersMeta->tutor_profile->level_of_fluency == 1)  ? "Semi-Fluent" : "Fluent")}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Passport</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit
                                            No:</strong><span>{{$usersMeta->tutor_profile->passport_no}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit Start Date:</strong><span
                                                class="">{{$usersMeta->tutor_profile->pass_start_date}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Permit Expiry
                                            Date:</strong><span>{{$usersMeta->tutor_profile->pass_expiry_date}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>DBS Certertificate</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Do you have a current DBS
                                            Cert?:</strong><span>{{$usersMeta->tutor_profile->passport_no}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>Enter the date the Certificate was issued?:</strong><span
                                                class="">{{$usersMeta->tutor_profile->cert_issued}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p><strong>If entered yes, please enter your DBS certificate no:</strong><span
                                                class="">{{$usersMeta->tutor_profile->dbs_certificate_no}}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Internet Update Service</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p>
                                        <strong>Did you register for the Internet Update Service?:</strong>
                                        <span>{{$usersMeta->tutor_profile->internet_update_service == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p><strong>Enter the date the Certificate was issued?:</strong><span
                                                class="">{{$usersMeta->tutor_profile->cert_issued}}</span></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Disabilities</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p><strong>Did you register for the Internet Update Service?:</strong>
                                        <span>{{$usersMeta->tutor_profile->internet_update_service == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p><strong>Do you have any medical conditions that we need to be aware of?:</strong>
                                        <span class="">{{$usersMeta->tutor_profile->medical_conditions == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Organization</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        @if($usersMeta->organisations_work)
                            @foreach($usersMeta->organisations_work as $organisation)
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="text-wrap listing">
                                            <p><strong>Company
                                                    name:</strong><span>{{$organisation->company_name}}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-wrap listing">
                                            <p><strong>Registration:</strong><span
                                                        class="">{{$organisation->registration}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="persnl-info">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Skills</h3>
                </div>
                <div class="col-sm-8">
                    <div class="text-wrap">
                        @foreach($usersMeta->categories as $keyCat=>$categorie)
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-wrap listing">
                                        <p><strong>Skills name:</strong><span>{{$categorie->name}}</span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-wrap listing">
                                        <p><strong>Qualified:</strong><span
                                                    class="">{{$usersMeta->qualified_level[$keyCat]->level}}</span></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="insert_form">
                {{ csrf_field() }}
                <div class="form-group ">
                    <label class="control-label " for="title">
                        Title
                    </label>
                    <input class="form-control"
                           name="tutor_id" value="{{$usersMeta->id}}" type="hidden"/>
                    <input class="form-control" id="title"
                           name="title" type="text"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                                <strong id="title-error"></strong>
                            </span>
                </div>


                <div class="form-group ">
                    <label class="control-label " for="type">
                        Type
                    </label>
                    <select class="form-control" id="type" name="type">
                        <option value="0">Fixed</option>
                        <option value="1">Hourly</option>
                    </select>
                </div>


                <div class="form-group ">
                    <label class="control-label " for="rate">
                        Rate
                    </label>
                    <input class="form-control" id="rate"
                           name="rate" type="text"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                                <strong id="rate-error"></strong>
                            </span>
                </div>


                <div class="form-group ">
                    <select class="form-control" name="specialist">
                        <option value="">Specialist</option>
                        @foreach($categories as  $categorieItem)
                            @if(isset($categorieItem->children['0']))
                                <optgroup label="{{$categorieItem->name}}"
                                          data-max-options="1">
                                    @foreach($categorieItem->children as  $categorieChild)
                                        <option value="{{$categorieChild->id}}">{{$categorieChild->name}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </optgroup>
                    </select>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                                <strong id="specialist-error"></strong>
                            </span>
                </div>

                <div class="form-group ">
                    <select class="form-control" name="qualified_levels">
                        <option value="">Level</option>
                        @foreach($levels as  $level)
                            @if(isset($level->childrenLevels['0']))
                                <optgroup label="{{$level->level}}"
                                          data-max-options="1">
                                    @foreach($level->childrenLevels as  $levelChild)
                                        <option value="{{$levelChild->id}}">{{$levelChild->level}}</option>                                                                            @endforeach
                            @endif
                        @endforeach
                    </select>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="text-danger">
                                <strong id="qualified_levels-error"></strong>
                            </span>
                </div>


                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success"/>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
    @push('scripts')

        <script>

            $('#insert_form').on("submit", function (event) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#title-error').html("");
                $('#rate-error').html("");
                $('#specialist-error').html("");
                $('#qualified_levels-error').html("");
                $.ajax({
                    type: "POST",
                    url: "{{url('/tutor')}}",
                    data: $('#insert_form').serialize(),
                    success: function (data) {
                         if (data.errors) {
                             $('#title-error').html(data.errors.title);
                            $('#rate-error').html(data.errors.rate);
                            $('#specialist-error').html(data.errors.specialist);
                            $('#qualified_levels-error').html(data.errors.qualified_levels);
                        }

                        if(data.success) {
                             $('#insert_form').trigger("reset");
                              bootoast.toast({
                                message: data.message
                            });
                        }
                    }
                });
                event.preventDefault();
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endpush
@stop
