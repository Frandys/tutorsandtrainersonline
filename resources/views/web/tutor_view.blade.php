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
                        {{--<h4 class="media-heading">{{substr($usersMeta->first_name,'0',1  ) . str_repeat("*", strlen($usersMeta->first_name)-1)}} {{substr($usersMeta->last_name,'0',1  ) . str_repeat("*", strlen($usersMeta->last_name)-1)}} </h4>--}}
                        <div class="row mb-3">
                            <div class="col-md-8">
                                <h4>{{$usersMeta->tutor_profile->uuid}}</h4>
                            </div>
                            <div class="col-md-4 text-right">
                                <button type="button" class="btn btn-primary"
                                        id="myModal1">
                                    Book a Session
                                </button>
                            </div>
                        </div>
                        <p>{{$usersMeta->tutor_profile->about}}</p>
                    </div>
                </div>

            </div>
        </div>

        {{--<div class="persnl-info">--}}
        {{--<div class="row">--}}
        {{--<div class="col-sm-4">--}}
        {{--<h3>Personal Information</h3>--}}
        {{--</div>--}}
        {{--<div class="col-sm-8">--}}
        {{--<div class="text-wrap">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Phone:</small><span>{{$usersMeta->phone}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Address:</small><span>{{$usersMeta->tutor_profile->address}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>City:</small><span>{{$usersMeta->tutor_profile->city}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>State:</small><span>{{$usersMeta->tutor_profile->state}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Country:</small><span>{{$usersMeta->country['0']->name}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Zip:</small><span>{{$usersMeta->tutor_profile->zip}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
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
                                    <p>
                                        <small>Full UK Driving
                                            License?:
                                        </small>
                                        <span>{{$usersMeta->tutor_profile->driving_license == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Are you willing to
                                            Travel?:
                                        </small>
                                        <span>{{$usersMeta->tutor_profile->willing_travel == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Please select the locations willing to travel</small>
                                        @foreach($ttrLocaWill as $LocaWill)
                                            <span class="multiple">{{$LocaWill->name}}</span>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Do you have the right to work in the
                                            UK?:
                                        </small>
                                        <span>{{$usersMeta->tutor_profile->driving_license == '1' ? 'YES' : 'NO'}}</span>
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
                                    <p>
                                        <small>Permit No:</small>
                                        <span>{{$usersMeta->tutor_profile->permit_no}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Permit Start Date:</small>
                                        <span>{{$usersMeta->tutor_profile->permit_start_date}}</span></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Permit Expiry Date:</small>
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
                                    <p>
                                        <small>Do you speak any other
                                            languages?:
                                        </small>
                                        <span>{{$usersMeta->tutor_profile->speak_languages == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Language:</small>@foreach($ttrLan as $lang) <span
                                                class="multiple">{{$lang->name}}</span> @endforeach</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Level of
                                            Fluency:
                                        </small>
                                        <span>{{($usersMeta->tutor_profile->level_of_fluency == 0) ? "Basic understanding" : (($usersMeta->tutor_profile->level_of_fluency == 1)  ? "Semi-Fluent" : "Fluent")}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="persnl-info">--}}
        {{--<div class="row">--}}
        {{--<div class="col-sm-4">--}}
        {{--<h3>Passport</h3>--}}
        {{--</div>--}}
        {{--<div class="col-sm-8">--}}
        {{--<div class="text-wrap">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Permit--}}
        {{--No:</small><span>{{$usersMeta->tutor_profile->passport_no}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Permit Start Date:</small><span--}}
        {{--class="">{{$usersMeta->tutor_profile->pass_start_date}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Permit Expiry--}}
        {{--Date:</small><span>{{$usersMeta->tutor_profile->pass_expiry_date}}</span>--}}
        {{--</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="persnl-info">--}}
        {{--<div class="row">--}}
        {{--<div class="col-sm-4">--}}
        {{--<h3>DBS Certertificate</h3>--}}
        {{--</div>--}}
        {{--<div class="col-sm-8">--}}
        {{--<div class="text-wrap">--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Do you have a current DBS--}}
        {{--Cert?:</small><span>{{$usersMeta->tutor_profile->passport_no}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>Enter the date the Certificate was issued?:</small><span--}}
        {{--class="">{{$usersMeta->tutor_profile->cert_issued}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
        {{--<div class="text-wrap listing">--}}
        {{--<p><small>If entered yes, please enter your DBS certificate no:</small><span--}}
        {{--class="">{{$usersMeta->tutor_profile->dbs_certificate_no}}</span></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
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
                                        <small>Did you register for the Internet Update Service?:</small>
                                        <span>{{$usersMeta->tutor_profile->internet_update_service == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Enter the date the Certificate was issued?:</small>
                                        <span
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
                                    <p>
                                        <small>Did you register for the Internet Update Service?:</small>
                                        <span>{{$usersMeta->tutor_profile->internet_update_service == '1' ? 'YES' : 'NO'}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-wrap listing">
                                    <p>
                                        <small>Do you have any medical conditions that we need to be aware of?:</small>
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
                                            <p>
                                                <small>Company
                                                    name:
                                                </small>
                                                <span>{{$organisation->company_name}}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="text-wrap listing">
                                            <p>
                                                <small>Registration:</small>
                                                <span
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
                                        <p>
                                            <small>Skills name:</small>
                                            <span>{{$categorie->name}}</span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-wrap listing">
                                        <p>
                                            <small>Qualified:</small>
                                            <span
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
                <h5 class="modal-title" id="exampleModalLabel">Book a Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
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
                                <small id="title-error"></small>
                            </span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="type">
                                    Type
                                </label>
                                <select class="form-control" id="type" name="type">
                                    <option value="0">Daily</option>
                                    <option value="1">Hourly</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="date">
                                   Date
                                </label>
                                <input class="form-control" name="date" readonly="" type="text" id="date">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                <small id="date-error"></small>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="rate">
                                    Specialist
                                </label>
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
                                <small id="specialist-error"></small>
                            </span>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="rate">
                                    Qualified levels
                                </label>
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
                                <small id="qualified_levels-error"></small>
                            </span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="rate">
                                    Type
                                </label>
                                <select class="form-control" name="type_levels">
                                    <option value="">Type</option>
                                    @foreach($disciplines as  $discipline)
                                        @if(isset($discipline->childrenDisciplines['0']))
                                            <optgroup label="{{$discipline->name}}"
                                                      data-max-options="1">
                                                @foreach($discipline->childrenDisciplines as  $disciplineChild)
                                                    <option value="{{$disciplineChild->id}}">{{$disciplineChild->name}}</option>                                                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                <small id="type_levels-error"></small>
                            </span>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="insert" id="insert" value="Book a Session" class="btn btn-success"/>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@push('scripts')

     <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>


    <script>
        var disabledArr = @php echo json_encode($dates); @endphp
        // var disabledArr = ["09/21/2018","09/23/2018","12/02/2016","12/23/2016"];
      console.log(disabledArr);

        $("#date").daterangepicker({
            minDate: new Date(),
            timePicker: true,
            locale: {
                format: 'M/DD/Y hh:mm A'
            },
            isInvalidDate: function(arg){
                // Prepare the date comparision
                var thisMonth = arg._d.getMonth()+1;   // Months are 0 based
                if (thisMonth<10){
                    thisMonth = "0"+thisMonth; // Leading 0
                }
                var thisDate = arg._d.getDate();
                if (thisDate<10){
                    thisDate = "0"+thisDate; // Leading 0
                }
                var thisYear = arg._d.getYear()+1900;   // Years are 1900 based

                var thisCompare = thisMonth +"/"+ thisDate +"/"+ thisYear;
                console.log(thisCompare);

                if($.inArray(thisCompare,disabledArr)!=-1){
                    return arg._pf = {userInvalidated: true};
                }
            }
        }).focus();

    </script>


    <script>


        $('#myModal1').click(function (e) {
            $('#myModal').modal('toggle');
            $("#insert_form")[0].reset();
            $('#title-error').html("");
            $('#date-error').html("");
            $('#specialist-error').html("");
            $('#qualified_levels-error').html("");
            $('#type_levels-error').html("");
        });


        $('#insert_form').on("submit", function (event) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#title-error').html("");
            $('#date-error').html("");
            $('#specialist-error').html("");
            $('#qualified_levels-error').html("");
            $('#type_levels-error').html("");
            $.ajax({
                type: "POST",
                url: "{{url('/tutors')}}",
                data: $('#insert_form').serialize(),
                success: function (data) {
                    if (data.errors) {
                        $('#title-error').html(data.errors.title);
                        $('#date-error').html(data.errors.date);
                        $('#specialist-error').html(data.errors.specialist);
                        $('#qualified_levels-error').html(data.errors.qualified_levels);
                        $('#type_levels-error').html(data.errors.type_levels);
                    }

                    if (data.success) {
                        $('#insert_form').trigger("reset");
                        bootoast.toast({
                            message: data.message
                        });
                        $('#myModal').modal('toggle');
                    }
                }
            });
            event.preventDefault();
        });
    </script>


@endpush
@stop
