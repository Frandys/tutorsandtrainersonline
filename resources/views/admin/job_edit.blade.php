@extends('layouts.admin.dashboard')
@section('page_heading','Edit Job')
@section('section')

    <div class="row">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Socio Professionista</h1>
                    <div id='progress'>
                        <div id='progress-complete'></div>
                    </div>

                    {{ Form::model($jobs, array('route' => array('job.update', \encrypt($jobs->id)),'id' => 'jobForm' ,'method' => 'PUT') ) }}

                    @include('message.message')
                    <fieldset>
                        <legend>Informazioni Generali</legend>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="title">
                                        Tutor Name
                                    </label>
                                    <input class="form-control" disabled
                                           value="{{$jobs->tutor->first_name}} {{$jobs->tutor->last_name}}"
                                           type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="title">
                                        Employer Name
                                    </label>
                                    <input class="form-control" disabled
                                           value="{{$jobs->employer->first_name}} {{$jobs->employer->last_name}}"
                                           type="text"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="title">
                                        Title
                                    </label>
                                    <input class="form-control" id="title" value="{{$jobs->title}}" name="title"
                                           type="text"/>
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="type">
                                        Types
                                    </label>
                                    <select class="form-control" name="type_levels">

                                        @foreach($disciplines as  $discipline)
                                            @if(isset($discipline->childrenDisciplines['0']))
                                                <optgroup label="{{$discipline->name}}"
                                                          data-max-options="1">
                                                    @foreach($discipline->childrenDisciplines as  $disciplineChild)
                                                        <option value="{{$disciplineChild->id}}" {{ $disciplineChild->id == $jobs->sub_disciplines_id ? 'selected="selected"' : '' }}>{{$disciplineChild->name}}</option>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('qualified_levels'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qualified_levels') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="title">
                                        Specialist
                                    </label>
                                    <select class="form-control" name="specialist">
                                        @foreach($categories as  $categorieItem)
                                            @if(isset($categorieItem->children['0']))
                                                <optgroup label="{{$categorieItem->name}}"
                                                          data-max-options="1">
                                                    @foreach($categorieItem->children as  $categorieChild)
                                                        <option value="{{$categorieChild->id}}" {{ $categorieChild->id == $jobs->categories_id ? 'selected="selected"' : '' }}>{{$categorieChild->name}}</option>
                                                    @endforeach
                                                    @endif
                                                    @endforeach
                                                </optgroup>
                                    </select>
                                    @if ($errors->has('specialist'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('specialist') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="rate">
                                        Qualified Levels
                                    </label>
                                    <select class="form-control" name="qualified_levels">

                                        @foreach($levels as  $level)
                                            @if(isset($level->childrenLevels['0']))
                                                <optgroup label="{{$level->level}}"
                                                          data-max-options="1">
                                                    @foreach($level->childrenLevels as  $levelChild)
                                                        <option value="{{$levelChild->id}}" {{ $levelChild->id == $jobs->qualified_levels_id ? 'selected="selected"' : '' }}>{{$levelChild->level}}</option>                                                                            @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('qualified_levels'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('qualified_levels') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label" for="title">
                                        Type
                                    </label>
                                    <select class="form-control" name="type">
                                        <option value="0" {{ '0' == $jobs->type ? 'selected="selected"' : '' }}>Daily
                                        </option>
                                        <option value="1" {{ '1' == $jobs->type ? 'selected="selected"' : '' }}>Hourly
                                        </option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">

                                <div class="form-group ">
                                    <label class="control-label" for="rate">
                                        Rate
                                    </label>
                                    <input class="form-control" name="date" readonly="" type="text" id="date">
                                    @if ($errors->has('rate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <input class="btn btn-primary next" type="submit" value="Update">
                        </div>


                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">


                    <form action="{{url('admin/assign_job')}}" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input name="job_id" required value="{{$jobs->id}}" type="hidden"/>
                        <fieldset>
                            <legend>Informazioni Generali</legend>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label" for="title">
                                            Employer Name
                                        </label>
                                        <input class="form-control" disabled
                                               value="{{$jobs->employer->first_name}} {{$jobs->employer->last_name}}"
                                               type="text"/>
                                    </div>
                                </div>


                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label>
                                            Select Tutor
                                        </label>
                                        <select class="form-control" name="tutor_assign[]" id="tutor_assign"
                                                multiple="">
                                            <option value="{{$jobs->tutor->id}}" selected>{{$jobs->tutor->first_name}}
                                                (Primary)
                                            </option>
                                            @foreach($usersMeta as  $usersTutor)
                                                @if($usersTutor['user']->id != $jobs->tutor->id)

                                                    <option value="{{$usersTutor['user']->id}}">{{$usersTutor['user']->first_name}}</option>

                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tutor_assign'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tutor_assign') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="text-right">
                                <input class="btn btn-primary next" type="submit" value="Assign">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">


                    <form action="{{url('admin/assign_job')}}" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input name="job_id" required value="{{$jobs->id}}" type="hidden"/>
                        <fieldset>
                            <legend>Informazioni Generali</legend>

                            <div class="row">

                                <table>
                                    <tr>
                                        <th>Tutor</th>
                                        <th>Status</th>

                                    </tr>
                                    @foreach($jobs['userJobs'] as $userJobs)
                                        <tr>
                                            <th>{{$userJobs->first_name}}</th>
                                            @if($userJobs->pivot->status == '0')
                                                <th>{{ 'Open'}}</th>
                                            @elseif ($userJobs->pivot->status == '1')
                                                <th>{{ 'Accept'}}</th>
                                            @else
                                                <th>{{'Reject'}}</th>
                                            @endif
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                            <style>
                                table {
                                    font-family: arial, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                td, th {
                                    border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;
                                }

                                tr:nth-child(even) {
                                    background-color: #dddddd;
                                }
                            </style>
                            @push('scripts')
                                <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                                <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                                <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>


                                <script>

                                    var disabledArr = ["09/20/2018","11/28/2016","12/02/2016","12/23/2016"];


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

                                    $(document).ready(function(){
                                        $(".daterangepicker").hide();
                                    });

                                </script>

                                <script src="{{ asset("js/admin/bootstrap-multiselect.js") }}"
                                        type="text/javascript"></script>
                                <link rel="stylesheet" href="{{ asset("css/bootstrap-multiselect.css") }}"/>

                                <script>
                                    $('#tutor_assign').multiselect({
                                        nonSelectedText: 'Select Tutor',
                                        enableFiltering: true,
                                        enableCaseInsensitiveFiltering: true,
                                        buttonWidth: '500px'
                                    });
                                </script>
    @endpush
@stop
