@extends('layouts.admin.dashboard')
@section('page_heading','View Tutor')
@section('section')
    @include('message.message')
    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1>Socio Professionista</h1>
                    <div id='progress'>
                        <div id='progress-complete'></div>
                    </div>

                    {{ Form::model($usersMeta, array('route' => array('tutor.update', \encrypt($usersMeta->id)),'id' => 'msform','enctype'=>'multipart/form-data','files' => true,'method' => 'PUT') ) }}

                    @include('message.message')
                    <fieldset>
                        <legend>Informazioni Generali</legend>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="first_name">
                                        Email
                                    </label>
                                    <input class="form-control" disabled="disabled" id="email"
                                           value="{{$usersMeta->email}}" name="" type="text"/>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="first_name">
                                        First Name
                                    </label>
                                    <input class="form-control" id="first_name"
                                           value="{{$usersMeta->first_name}}"
                                           name="first_name" type="text"/>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="last_name">
                                        Last Name
                                    </label>
                                    <input class="form-control" id="last_name" value="{{$usersMeta->last_name}}"
                                           name="last_name" type="text"/>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="phone">
                                        Phone
                                    </label>
                                    <input class="form-control" id="phone" value="{{$usersMeta->phone}}"
                                           name="phone" type="text"/>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="city">
                                        City
                                    </label>
                                    <input class="form-control" id="city"
                                           value="{{$usersMeta->tutor_profile->city}}"
                                           name="city" type="text"/>
                                    @if ($errors->has('city'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="state">
                                        State
                                    </label>
                                    <input class="form-control"
                                           value="{{$usersMeta->tutor_profile->state}}"
                                           id="state" name="state" type="text"/>
                                    @if ($errors->has('state'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="country">
                                        Country
                                    </label>

                                    <select name="country" id="country" class="form-control">
                                        <option value="">Select</option>
                                        @foreach(\App\Model\Country::all() as $country)
                                            <option value="{{$country['id']}}" {{ $usersMeta->tutor_profile->country_id == $country['id'] ?  "selected" : '' }}>{{$country['name']}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="zip">
                                        Zip
                                    </label>
                                    <input class="form-control"
                                           value="{{$usersMeta->tutor_profile->zip}}"
                                           id="zip" name="zip" type="text"/>
                                    @if ($errors->has('zip'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="address">
                                        Address
                                    </label>
                                    <textarea name="address" id="address" class="form-control"
                                              rows="3">{{$usersMeta->tutor_profile->address}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="about">
                                        About
                                    </label>
                                    <textarea id="about" name="about" class="form-control"
                                              rows="3">{{$usersMeta->tutor_profile->about}}</textarea>
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Informazioni Professionali</legend>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">

                                <div class="form-group ">
                                    <label> Full UK Driving License? </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="driving_license" id="driving_license"
                                                   value="0" {{ $usersMeta->tutor_profile->driving_license == '0' ?  "checked" : '' }} >No
                                        </label>
                                        <label>
                                            <input type="radio" name="driving_license" id="driving_license"
                                                   value="1" {{ $usersMeta->tutor_profile->driving_license == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label>
                                        Did you register for the Internet Update Service?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="internet_update_service"
                                                   id="internet_update_service"
                                                   value="0" {{ $usersMeta->tutor_profile->internet_update_service == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="internet_update_service"
                                                   id="internet_update_service"
                                                   value="1" {{ $usersMeta->tutor_profile->internet_update_service == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label>
                                        Do you have the right to work in the UK?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="work_in_uk" id="work_in_uk"
                                                   value="0" {{ $usersMeta->tutor_profile->work_in_uk == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="work_in_uk" id="work_in_uk"
                                                   value="1" {{ $usersMeta->tutor_profile->work_in_uk == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label> Level of Fluency </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="level_of_fluency" id="level_of_fluency"
                                                   value="0" {{ $usersMeta->tutor_profile->level_of_fluency == '0' ?  "checked" : '' }} >Basic
                                            understanding
                                        </label> <label>
                                            <input type="radio" name="level_of_fluency" id="level_of_fluency"
                                                   value="1" {{ $usersMeta->tutor_profile->level_of_fluency == '1' ?  "checked" : '' }} >Semi-Fluent
                                        </label> <label>
                                            <input type="radio" name="level_of_fluency" id="level_of_fluency"
                                                   value="2" {{ $usersMeta->tutor_profile->level_of_fluency == '2' ?  "checked" : '' }} >Fluent
                                        </label></div>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>
                                        Do you speak any other languages?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="speak_languages" id="speak_languages"
                                                   value="0" {{ $usersMeta->tutor_profile->speak_languages == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="speak_languages" id="speak_languages"
                                                   value="1" {{ $usersMeta->tutor_profile->speak_languages == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label " for="language">
                                        Language
                                    </label>
                                    <select name="language[]" id="language" multiple="" class="form-control">
                                        @foreach(\App\Model\Language::all() as $lang)
                                            <option value="{{$lang->id}}" {{in_array($lang->id, ($usersMeta->tutor_profile->language_id ? unserialize($usersMeta->tutor_profile->language_id) : array())) ? ' selected="selected" ' : ''}}>{{$lang->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label>
                                        Can you provide the certificates?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="certificates" id="certificates"
                                                   value="0" {{ $usersMeta->tutor_profile->certificates == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="certificates" id="certificates"
                                                   value="1" {{ $usersMeta->tutor_profile->certificates == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label show" for="certificate_issued">
                                        Enter the date the Certificate was issued?
                                    </label>

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" class="form-control" name="certificate_issued"
                                               value="{{$usersMeta->tutor_profile->certificate_issued}}"
                                               data-date-format="dd-mm-yyyy" id="certificate_issued">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label>
                                        Do you have a current DBS Cert?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="dbs_cert" id="dbs_cert"
                                                   value="0" {{ $usersMeta->tutor_profile->dbs_cert == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="dbs_cert" id="dbs_cert"
                                                   value="1" {{ $usersMeta->tutor_profile->dbs_cert == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label show" for="cert_issued">
                                        Enter the date the Certificate dbs cert?
                                    </label>

                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" value="{{$usersMeta->tutor_profile->cert_issued}}"
                                               class="form-control" name="cert_issued"
                                               id="cert_issued">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label> Are you willing to Travel? </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="willing_travel" id="willing_travel"
                                                   value="0" {{ $usersMeta->tutor_profile->willing_travel == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="willing_travel" id="willing_travel"
                                                   value="1" {{ $usersMeta->tutor_profile->willing_travel == '1' ?  "checked" : '' }} >Yes
                                        </label></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group ">
                                    <label class="control-label show" for="certificate_issued">
                                        Please select the location willing to travel to below...
                                    </label>

                                    <select name="travel_location[]" id="travel_location" multiple=""
                                            class="form-control">
                                        @foreach(\App\Model\Country::all() as $country)
                                            <option value="{{$country->id}}" {{in_array($country->id, ($usersMeta->tutor_profile->travel_location ? unserialize($usersMeta->tutor_profile->travel_location) : array())) ? ' selected="selected" ' : ''}}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="disabilities?">
                                        Do you have any disabilities?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="disabilities" id="disabilities"
                                                   value="0" {{ $usersMeta->tutor_profile->disabilities == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="disabilities" id="disabilities"
                                                   value="1" {{ $usersMeta->tutor_profile->disabilities == '1' ?  "checked" : '' }} >Yes
                                        </label></div>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="dbs_certificate_no">
                                        If entered yes, please enter your DBS certificate no.
                                    </label>
                                    <input class="form-control valid"
                                           value="{{$usersMeta->tutor_profile->dbs_certificate_no}}"
                                           id="dbs_certificate_no" name="dbs_certificate_no" type="text"
                                           aria-invalid="false">
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="medical_conditions?">
                                        Do you have any medical conditions that we need to be aware of?
                                    </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="medical_conditions" id="medical_conditions"
                                                   value="0" {{ $usersMeta->tutor_profile->medical_conditions == '0' ?  "checked" : '' }} >No
                                        </label> <label>
                                            <input type="radio" name="medical_conditions" id="medical_conditions"
                                                   value="1" {{ $usersMeta->tutor_profile->medical_conditions == '1' ?  "checked" : '' }} >Yes
                                        </label></div>

                                </div>
                            </div>

                        </div>


                        {{--<div class="row">--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label" for="photo">--}}
                        {{--Profile Image--}}
                        {{--</label>--}}
                        {{--<input name="photo" id="photo" type="file">--}}
                        {{--<a download="{{$usersMeta->photo}}"--}}
                        {{--href="{{asset('images/users').'/'.$usersMeta->photo}}"--}}
                        {{--title="User photo">--}}

                        {{--{{($usersMeta->photo != '') ? 'Download' : ''}}--}}
                        {{--</a>--}}
                        {{--@if ($errors->has('photo'))--}}
                        {{--<span class="help-block">--}}
                        {{--<strong>{{ $errors->first('photo') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-6 col-sm-6">--}}
                        {{--<div class="form-group">--}}
                        {{--<label class="control-label" for="resume">--}}
                        {{--Resume--}}
                        {{--</label>--}}
                        {{--<input name="resume" id="resume" type="file">--}}
                        {{--<a download="{{$usersMeta->tutor_profile->resume}}"--}}
                        {{--href="{{asset('images/resume').'/'.$usersMeta->tutor_profile->resume}}"--}}
                        {{--title="ImageName">--}}
                        {{--{{($usersMeta->tutor_profile->resume != '') ? 'Download' : ''}}--}}
                        {{--</a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                    </fieldset>
                    <fieldset>
                        <legend>Disponibilità</legend>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="well clearfix">
                                    <div id="first">
                                        @foreach($categorieUser as $keyCerti=>$categorie)
                                            <div class="recordsetParent" id="parntDiv{{$keyCerti}}">
                                                <div class="fieldRow clearfix">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                               value="{{isset($categorie->id) ? encrypt($categorie->id) : ''}}"
                                                               hidden name="certificates_id[{{$keyCerti}}]">
                                                        <div id="div_certificates_categorie" class="form-group">
                                                            <label for="certificates_{{$keyCerti}}__categorie"
                                                                   class="control-label  requiredField">
                                                                Categorie<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls certificates_categorie">
                                                                <select name="certificates_categorie[{{$keyCerti}}]"
                                                                        id="certificates_{{$keyCerti}}_categorie"
                                                                        class="selectpicker length">
                                                                    @foreach($categories as  $categorieItem)
                                                                        @if(!empty($categorieItem->children))
                                                                            <optgroup label="{{$categorieItem->name}}"
                                                                                      data-max-options="1">
                                                                                @foreach($categorieItem->children as  $categorieChild)
                                                                                    <option value="{{$categorieChild->id}}" {{$categorieChild->id == $categorie->id ? ' selected="selected" ' : ''}} >{{$categorieChild->name}}</option>
                                                                                @endforeach
                                                                                @endif
                                                                                @endforeach
                                                                            </optgroup>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div id="div_certificates_level" class="form-group">
                                                            <label for="certificates_{{$keyCerti}}_level"
                                                                   class="control-label  requiredField">
                                                                Level<span
                                                                        class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls certificates_level">
                                                                <input type="text"
                                                                       value="{{$categorie->pivot->level}}"
                                                                       name="certificates_level[{{$keyCerti}}]"
                                                                       id="certificates_{{$keyCerti}}_level"
                                                                       class="textinput form-control length"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($keyCerti > '0')
                                                        <div id="parntDiv{{$keyCerti}}" class="bunPare"
                                                             onchange="enableTxt(this)"
                                                             style="float: right; border: 0px; background-image: url(&quot;../../../images/icons/remove.png&quot;); background-position: center center; background-repeat: no-repeat; height: 25px; width: 25px; cursor: pointer;"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach


                                        <div id="czContainer">
                                            <div id="first">
                                                <div class="recordset">
                                                    <div class="fieldRow clearfix">
                                                        <input type="text" value=""
                                                               hidden name="certificates_id[{{'2'}}]">
                                                        <div class="col-md-5">
                                                            <div id="div_certificates_categorie" class="form-group">
                                                                <label for="certificates_1_categorie"
                                                                       class="control-label  requiredField">
                                                                    Categorie<span class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls certificates_categorie">

                                                                    <select name="certificates_categorie[{{'2'}}]"
                                                                            id="certificates_1_categorie"
                                                                            class="selectpicker length">
                                                                        @foreach($categories as  $categorieItem)
                                                                            @if(!empty($categorieItem->children))
                                                                                <optgroup
                                                                                        label="{{$categorieItem->name}}"
                                                                                        data-max-options="1">
                                                                                    @foreach($categorieItem->children as  $categorieChild)
                                                                                        <option value="{{$categorieChild->id}}" {{isset($categorie->id) ==  $categorieChild->id  ? ' selected="selected" ' : ''}} >{{$categorieChild->name}}</option>
                                                                                    @endforeach
                                                                                    @endif
                                                                                    @endforeach
                                                                                </optgroup>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div id="div_certificates_level" class="form-group">
                                                                <label for="certificates_1_level"
                                                                       class="control-label  requiredField">
                                                                    Level<span
                                                                            class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls certificates_level">
                                                                    <input type="text"
                                                                           name="certificates_level[{{'2'}}]"
                                                                           id="certificates_1_level"
                                                                           class="textinput form-control length"/>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <p>Work experence </p>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="well clearfix">
                                    <div id="second">
                                        @foreach($organisations as $keyWork=>$work_experience)
                                            <div class="recordsetWork" id="parntDivWork{{$keyWork}}">
                                                <input type="text"
                                                       value="{{isset($work_experience->id) ? encrypt($work_experience->id) : ''}}"
                                                       hidden name="work_id[{{$keyWork}}]">
                                                <div class="fieldRow clearfix">
                                                    <div class="col-md-3">
                                                        <div id="div_company_name" class="form-group">
                                                            <label for="company_{{$keyWork}}_name"
                                                                   class="control-label  requiredField">
                                                                Company Name<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls company_name">
                                                                <input type="text"
                                                                       name="company_name[{{$keyWork}}]"
                                                                       value="{{$work_experience->company_name}}"
                                                                       id="company_{{$keyWork}}_name"
                                                                       class="textinput form-control length"/>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div id="div_organization_registration" class="form-group">
                                                            <label for="organization_1_registration"
                                                                   class="control-label  requiredField">
                                                                Registration<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls organization_registration">
                                                                <input type="text"
                                                                       name="organization_registration[{{$keyWork}}]"
                                                                       value="{{$work_experience->registration}}"
                                                                       id="organization_{{$keyWork}}_registration"
                                                                       class="textinput form-control length"/>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    @if($keyWork > '0')
                                                        <div id="parntDivWork{{$keyWork}}" class="bunPareWork"
                                                             onchange="enableTxt(this)"
                                                             style="float: right; border: 0px; background-image: url(&quot;../../../images/icons/remove.png&quot;); background-position: center center; background-repeat: no-repeat; height: 25px; width: 25px; cursor: pointer;"></div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>


                                    <div id="czContainerWork">
                                        <div id="second">
                                            <div class="recordsetWork">
                                                <input type="text" value=""
                                                       hidden name="work_id[{{'2'}}]">
                                                <div class="fieldRow clearfix">
                                                    <div class="col-md-3">
                                                        <div id="div_company_name" class="form-group">
                                                            <label for="company_1_name"
                                                                   class="control-label  requiredField">
                                                                Company Name<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls company_name">
                                                                <input type="text"
                                                                       name="company_name[{{'2'}}]"
                                                                       id="company_1_name"
                                                                       class="textinput form-control length"/>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div id="div_organization_registration" class="form-group">
                                                            <label for="organization_1_registration"
                                                                   class="control-label  requiredField">
                                                                Registration<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls organization_registration">
                                                                <input type="text"
                                                                       name="organization_registration[{{'2'}}]"
                                                                       id="organization_1_registration"
                                                                       class="textinput form-control length"/>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="div_checkbox">

                            <div class="form-group">
                                <div>
                                    <button class="btn btn-success" id="sads" name="submit" type="submit">
                                        Invi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    {{--</form>--}}
                    {{ Form::close() }}
                </div>
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
    @endpush
@stop
