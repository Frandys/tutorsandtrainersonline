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
                                    <label class="control-label" for="rate">
                                        Rate
                                    </label>
                                    <input class="form-control" id="rate" value="{{$jobs->rate}}" name="rate"
                                           type="text"/>
                                    @if ($errors->has('rate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rate') }}</strong>
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
                                        <option value="">Specialist</option>
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
                                        <option value="">Level</option>
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
                                        <option value="0" {{ '0' == $jobs->type ? 'selected="selected"' : '' }}>Fixed</option>
                                        <option value="1" {{ '1' == $jobs->type ? 'selected="selected"' : '' }}>Hourly</option>
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
                                    <label class="control-label" for="status">
                                       Status
                                    </label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{ '0' == $jobs->status ? 'selected="selected"' : '' }}>Open</option>
                                        <option value="1" {{ '1' == $jobs->status ? 'selected="selected"' : '' }}>Done</option>
                                        <option value="2" {{ '2' == $jobs->status ? 'selected="selected"' : '' }}>Cancel</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" value="Update">
                        </div>
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    </div>


@stop
