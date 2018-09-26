@include('message.message')
<fieldset>
    <legend>General Information</legend>

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
                    Post Code
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
                               value="0" checked {{ $usersMeta->tutor_profile->driving_license == '0' ?  "checked" : '' }} >No
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
                               value="0" checked {{ $usersMeta->tutor_profile->internet_update_service == '0' ?  "checked" : '' }} >No
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
                               value="0" checked {{ $usersMeta->tutor_profile->work_in_uk == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="work_in_uk" id="work_in_uk"
                               value="1" {{ $usersMeta->tutor_profile->work_in_uk == '1' ?  "checked" : '' }} >Yes
                    </label></div>
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Do you speak any other languages?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" name="speak_languages" id="speak_languages"
                               value="0" checked {{ $usersMeta->tutor_profile->speak_languages == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="speak_languages" id="speak_languages"
                               value="1" {{ $usersMeta->tutor_profile->speak_languages == '1' ?  "checked" : '' }} >Yes
                    </label></div>
            </div>
        </div>

    </div>


    <div class="row">
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
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label> Level of Fluency </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="level_of_fluency" id="level_of_fluency"
                               value="0" {{ $usersMeta->tutor_profile->level_of_fluency == '0' ?  "checked" : '' }} >Basic
                        understanding
                    </label>
                    <label>
                        <input type="radio" name="level_of_fluency" id="level_of_fluency"
                               value="1" {{ $usersMeta->tutor_profile->level_of_fluency == '1' ?  "checked" : '' }} >Semi-Fluent
                    </label>
                    <label>
                        <input type="radio" name="level_of_fluency" id="level_of_fluency"
                               value="2" {{ $usersMeta->tutor_profile->level_of_fluency == '2' ?  "checked" : '' }} >Fluent
                    </label></div>
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
                        <input type="radio" checked name="certificates" id="certificates"
                               value="0"  {{ $usersMeta->tutor_profile->certificates == '0' ?  "checked" : '' }} >No
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

                <div data-date-format="yyyy-mm-dd" class="input-group date"
                     data-provide="datepicker">
                    <input readonly type="text" class="form-control" name="certificate_issued"
                           value="{{$usersMeta->tutor_profile->certificate_issued}}"
                           id="certificate_issued">
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
                        <input type="radio" checked name="dbs_cert" id="dbs_cert"
                               value="0" {{ $usersMeta->tutor_profile->dbs_cert == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="dbs_cert" id="dbs_cert"
                               value="1" {{ $usersMeta->tutor_profile->dbs_cert == '1' ?  "checked" : '' }} >Yes
                    </label></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label>
                    Select type
                </label>
                <select class="form-control" name="disciplines[]" id="disciplines" multiple="">
                    @foreach($disciplines as  $disciplineItem)
                        @if(isset($disciplineItem->childrenDisciplines['0']))
                            <optgroup label="{{$disciplineItem->name}}"
                                      data-max-options="1">
                                @foreach($disciplineItem->childrenDisciplines as  $disciplineChild)
                                    <option value="{{$disciplineChild->id}}" {{in_array( $disciplineChild->id, $disciplineArray ) ? ' selected="selected" ' : ''}} >{{$disciplineChild->name}}</option>
                                @endforeach
                                @endif
                                @endforeach
                            </optgroup>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
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
            <div class="form-group ">
                <label class="control-label show" for="cert_issued">
                    Enter the date the Certificate dbs cert?
                </label>

                <div data-date-format="yyyy-mm-dd" class="input-group date"
                     data-provide="datepicker">
                    <input readonly type="text"
                           value="{{$usersMeta->tutor_profile->cert_issued}}"
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
                        <input type="radio" checked name="willing_travel" id="willing_travel"
                               value="0" {{ $usersMeta->tutor_profile->willing_travel == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="willing_travel" id="willing_travel"
                               value="1" {{ $usersMeta->tutor_profile->willing_travel == '1' ?  "checked" : '' }} >Yes
                    </label></div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label show" for="travel_location">
                    Please select the locations willing to travel to below...
                </label>


                <select class="form-control" name="travel_location[]" id="travel_location" multiple="">
                    @foreach($countries as  $keyCun=>$country)
                        @if(isset($country->children['0']))
                            <optgroup label="{{$country->name}}"
                                      data-max-options="1">
                                @foreach($country->children as  $categorieChild)
                                    <option value="{{$categorieChild->id}}" {{( isset($usersMeta->country[$keyCun]) && $usersMeta->country[$keyCun]->id == $categorieChild->id) ? 'selected' : '' }} >{{$categorieChild->name}}</option>
                                @endforeach
                                @endif
                                @endforeach
                            </optgroup>
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
                        <input type="radio" checked name="disabilities" id="disabilities"
                               value="0" {{ $usersMeta->tutor_profile->disabilities == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="disabilities" id="disabilities"
                               value="1" {{ $usersMeta->tutor_profile->disabilities == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="control-label" for="medical_conditions?">
                    Do you have any medical conditions that we need to be aware of?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="medical_conditions" id="medical_conditions"
                               value="0" {{ $usersMeta->tutor_profile->medical_conditions == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="medical_conditions" id="medical_conditions"
                               value="1" {{ $usersMeta->tutor_profile->medical_conditions == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <legend>Disponibilità</legend>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2>Certifications</h2>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="well clearfix first-well">
                <div id="first">
                    @foreach($categorieUser as $keyCerti=>$categorie)
                        <div class="recordsetParent" id="parntDiv{{$keyCerti}}">
                            <div class="fieldRow clearfix">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text"
                                               value="{{isset($categorie->id) ? encrypt($categorie->id) : ''}}"
                                               hidden name="certificates_id[{{$keyCerti}}]">
                                        <div id="div_certificates_categorie" class="form-group">
                                            <label for="certificates_{{$keyCerti}}__categorie"
                                                   class="control-label  requiredField">
                                                Category<span class="asteriskField">*</span>
                                            </label>
                                            <div class="controls certificates_categorie">
                                                <select name="certificates_categorie[{{$keyCerti}}]"
                                                        id="certificates_{{$keyCerti}}_categorie"
                                                        class="selectpicker length form-control">
                                                    @foreach($categories as  $categorieItem)
                                                        @if(isset($categorieItem->children['0']))
                                                            <optgroup
                                                                    label="{{$categorieItem->name}}"
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
                                                Level<span class="asteriskField">*</span>
                                            </label>
                                            <div class="controls certificates_level">
                                                <select name="certificates_level[{{$keyCerti}}]"
                                                        id="certificates_{{$keyCerti}}_level"
                                                        class="length form-control">
                                                    @foreach($levels as  $level)
                                                        @if(isset($level->childrenLevels['0']))
                                                            <optgroup label="{{$level->level}}"
                                                                      data-max-options="1">
                                                                @foreach($level->childrenLevels as  $levelChild)
                                                                    <option value="{{$levelChild->id}}" {{( isset($usersMeta->qualified_level[$keyCerti]) && $usersMeta->qualified_level[$keyCerti]->id == $levelChild->id) ? 'selected' : '' }} >{{$levelChild->level}}</option>                                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    {{--@foreach(\App\Model\QualifiedLevel::all() as   $qualified)--}}
                                                    {{--<option value="{{$qualified->id}}" {{( isset($usersMeta->qualified_level[$keyCerti]) && $usersMeta->qualified_level[$keyCerti]->id == $qualified->id) ? 'selected' : '' }}  >{{$qualified->level}}</option>--}}
                                                    {{--@endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group ">
                                            <div id="div_certificates_rate" class="form-group certificates_rate">
                                                <label for="certificates_{{$keyCerti}}_rate"
                                                       class="control-label  requiredField">
                                                    Rate<span class="asteriskField">*</span>
                                                </label>

                                                <input  type="text" name="certificates_rate[{{$keyCerti}}]"
                                                        id="certificates_{{$keyCerti}}_rate"
                                                        class="length form-control"
                                                        value="{{isset($usersMeta->categories[$keyCerti]->pivot->rate) ? $usersMeta->categories[$keyCerti]->pivot->rate : ''}}">


                                            </div>
                                        </div>
                                    </div>
                                    @if($keyCerti > '0')
                                        <div id="parntDiv{{$keyCerti}}" class="bunPare"
                                             onchange="enableTxt(this)">
                                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="czContainer">
                        <div id="first">
                            <div class="recordset">
                                <div class="fieldRow clearfix">
                                    <div class="row">
                                        <input type="text" value="" hidden
                                               name="certificates_id[{{'2'}}]">
                                        <div class="col-md-5">
                                            <div id="div_certificates_categorie"
                                                 class="form-group">
                                                <label for="certificates_1_categorie"
                                                       class="control-label  requiredField">
                                                    Categorie<span
                                                            class="asteriskField">*</span>
                                                </label>
                                                <div class="controls certificates_categorie">

                                                    <select name="certificates_categorie[{{'2'}}]"
                                                            id="certificates_1_categorie"
                                                            class="selectpicker length form-control">
                                                        @foreach($categories as  $categorieItem)
                                                            @if(isset($categorieItem->children['0']))
                                                                <optgroup
                                                                        label="{{$categorieItem->name}}"
                                                                        data-max-options="1">
                                                                    @foreach($categorieItem->children as  $categorieChild)
                                                                        <option value="{{$categorieChild->id}}">{{$categorieChild->name}}</option>
                                                                    @endforeach

                                                                </optgroup>
                                                            @endif
                                                        @endforeach
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
                                                    <div class="controls certificates_level">
                                                        <select name="certificates_level[{{'2'}}]"
                                                                id="certificates_1_level"
                                                                class="length form-control">

                                                            @foreach($levels as  $levelVal)
                                                                @if(isset($levelVal->childrenLevels['0']) && $levelVal->childrenLevels != '')
                                                                    <optgroup
                                                                            label="{{$levelVal->level}}"
                                                                            data-max-options="1">
                                                                        @foreach($levelVal->childrenLevels as  $levelChild)
                                                                            <option value="{{$levelChild->id}}">{{$levelChild->level}}</option>
                                                                        @endforeach

                                                                    </optgroup>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div id="div_organization_registration"
                                                 class="form-group certificates_rate">
                                                <label for="certificates_1_rate"
                                                       class="control-label  requiredField">
                                                    Rate<span
                                                            class="asteriskField">*</span>
                                                </label>
                                                <div class="controls certificates_rate">
                                                    <input type="text"
                                                           name="certificates_rate[{{'2'}}]"
                                                           id="certificates_1_rate"
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
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2>Work Experience </h2>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="well clearfix second-well">
                <div id="second">
                    @foreach($organisations as $keyWork=>$work_experience)
                        <div class="recordsetWork" id="parntDivWork{{$keyWork}}">
                            <input type="text"
                                   value="{{isset($work_experience->id) ? encrypt($work_experience->id) : ''}}"
                                   hidden name="work_id[{{$keyWork}}]">
                            <div class="fieldRow clearfix">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div id="div_company_name" class="form-group">
                                            <label for="company_{{$keyWork}}_name"
                                                   class="control-label  requiredField">Company
                                                Name<span class="asteriskField">*</span>
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
                                    <div class="col-md-3">
                                        <div id="div_organization_registration"
                                             class="form-group">
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
                                             onchange="enableTxt(this)"><i class="fa fa-trash-o"
                                                                           aria-hidden="true"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="czContainerWork">
                        <div id="second">
                            <div class="recordsetWork">
                                <input type="text" value=""
                                       hidden name="work_id[{{'2'}}]">
                                <div class="fieldRow clearfix">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="div_company_name" class="form-group">
                                                <label for="company_1_name"
                                                       class="control-label  requiredField">
                                                    Company Name<span
                                                            class="asteriskField">*</span>
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
                                            <div id="div_organization_registration"
                                                 class="form-group">
                                                <label for="organization_1_registration"
                                                       class="control-label  requiredField">
                                                    Registration<span
                                                            class="asteriskField">*</span>
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Passport</h2>
        </div>
        <div class="col-md-12">
            <div class="well third-well">
                <div class="row">
                    <div class="col-md-4">
                        <label for="pass_start_date"
                               class="control-label">
                            Start Date: <span class="asteriskField">*</span>
                        </label>

                        <div data-date-format="yyyy-mm-dd" class="input-group  date  passStartDates" data-provide="datepicker">
                            <input readonly type="text" class="form-control valid"
                                   name="pass_start_date"
                                   value="{{$usersMeta->tutor_profile->pass_start_date}}"
                                   id="pass_start_date">

                            <div class="input-group-addon">
                                <i class="far fa-calendar-alt"></i>
                            </div>

                        </div>


                    </div>
                    <div class="col-md-4">
                        <label for="permit_expiry_date"
                               class="control-label">
                            Expiry Date: <span class="asteriskField">*</span>
                        </label>
                        <div data-date-format="yyyy-mm-dd"
                             class="input-group date permitEndDates"
                             data-provide="datepicker">
                            <input readonly type="text" readonly class="form-control valid"
                                   name="permit_expiry_date"
                                   value="{{$usersMeta->tutor_profile->permit_expiry_date}}"
                                   id="permit_expiry_date">
                            <div class="input-group-addon">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <label for="passport_no"
                               class="control-label">
                            Passport No: <span class="asteriskField">*</span>
                        </label>
                        <input type="text" value="{{$usersMeta->tutor_profile->passport_no}}"
                               name="passport_no"
                               id="passport_no"
                               class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Work Permit</h2>
        </div>
        <div class="col-md-12">
            <div class="well fourth-well">
                <div class="row">
                    <div class="col-md-4">
                        <label for="permit_start_date"
                               class="control-label">
                            Start Date: <span class="asteriskField">*</span>
                        </label>

                        <div data-date-format="yyyy-mm-dd"
                             class="input-group date permitStartDates"
                             data-provide="datepicker">
                            <input readonly type="text" class="form-control valid"
                                   name="permit_start_date"
                                   value="{{$usersMeta->tutor_profile->permit_start_date}}"
                                   id="permit_start_date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <label for="permit_expiry_date"
                               class="control-label">
                            Expiry Date: <span class="asteriskField">*</span>
                        </label>
                        <div data-date-format="yyyy-mm-dd"
                             class="input-group date permitEndDates"
                             data-provide="datepicker">
                            <input readonly type="text" readonly class="form-control valid"
                                   name="permit_expiry_date"
                                   value="{{$usersMeta->tutor_profile->permit_expiry_date}}"
                                   id="permit_expiry_date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="permit_no"
                               class="control-label">
                            Work Permit: <span class="asteriskField">*</span>
                        </label>
                        <input type="text" value="{{$usersMeta->tutor_profile->permit_no}}"
                               name="permit_no"
                               id="permit_no"
                               class="form-control"/>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Upload Documents</h2>
        </div>
        <div class="col-md-12">
            <div class="well other-well v">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="photo">
                                Profile Image
                            </label>
                            <input name="photo" id="photo" type="file">
                            <a download="{{$usersMeta->photo}}"
                               href="{{asset('images/photo').'/'.$usersMeta->photo}}"
                               title="User photo">
                                {{($usersMeta->photo != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('photo'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="cv">
                                Resume
                            </label>
                            <input name="cv" id="cv" type="file">
                            <a download="{{$usersMeta->tutor_profile->cv}}"
                               href="{{asset('images/cv').'/'.$usersMeta->tutor_profile->cv}}"
                               title="cv">
                                {{($usersMeta->tutor_profile->cv != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('cv'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('cv') }}</strong>
                                        </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="dbs_cert_upload">
                                Dbs Cert
                            </label>
                            <input name="dbs_cert_upload" id="dbs_cert_upload" type="file">
                            <a download="{{$usersMeta->tutor_profile->dbs_cert_upload}}"
                               href="{{asset('images/dbs_cert_upload').'/'.$usersMeta->tutor_profile->dbs_cert_upload}}"
                               title="User photo">

                                {{($usersMeta->tutor_profile->dbs_cert_upload != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('dbs_cert_upload'))
                                <span class="help-block">
                                                        <strong>{{ $errors->first('dbs_cert_upload') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="certificates_upload">
                                Certificates
                            </label>
                            <input name="certificates_upload" id="certificates_upload"
                                   type="file">
                            <a download="{{$usersMeta->tutor_profile->certificates_upload}}"
                               href="{{asset('images/certificates_upload').'/'.$usersMeta->tutor_profile->certificates_upload}}"
                               title="ImageName">
                                {{($usersMeta->tutor_profile->certificates_upload != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('certificates_upload'))
                                <span class="help-block">
                                                        <strong>{{ $errors->first('certificates_upload') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="teaching_qual">
                                Teaching Qual
                            </label>
                            <input name="teaching_qual" id="teaching_qual" type="file">
                            <a download="{{$usersMeta->tutor_profile->teaching_qual}}"
                               href="{{asset('images/teaching_qual').'/'.$usersMeta->tutor_profile->teaching_qual}}"
                               title="User photo">

                                {{($usersMeta->tutor_profile->teaching_qual != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('teaching_qual'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('teaching_qual') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="teaching_cert">
                                Teaching Cert
                            </label>
                            <input name="teaching_cert" id="teaching_cert" type="file">
                            <a download="{{$usersMeta->tutor_profile->teaching_cert}}"
                               href="{{asset('images/teaching_cert').'/'.$usersMeta->tutor_profile->teaching_cert}}"
                               title="ImageName">
                                {{($usersMeta->tutor_profile->teaching_cert != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('teaching_cert'))
                                <span class="help-block">
                                                        <strong>{{ $errors->first('teaching_cert') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="passport">
                                Passport
                            </label>
                            <input name="passport" id="passport" type="file">
                            <a download="{{$usersMeta->tutor_profile->passport}}"
                               href="{{asset('images/passport').'/'.$usersMeta->tutor_profile->passport}}"
                               title="Passport">

                                {{($usersMeta->tutor_profile->passport != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('passport'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('passport') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="work_permit">
                                Work Permit
                            </label>
                            <input name="work_permit" id="work_permit" type="file">
                            <a download="{{$usersMeta->tutor_profile->work_permit}}"
                               href="{{asset('images/work_permit').'/'.$usersMeta->tutor_profile->work_permit}}"
                               title="ImageName">
                                {{($usersMeta->tutor_profile->work_permit != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('work_permit'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('work_permit') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label class="control-label" for="birth_certificate">
                                Birth Certificate
                            </label>
                            <input name="birth_certificate" id="birth_certificate" type="file">
                            <a download="{{$usersMeta->tutor_profile->birth_certificate}}"
                               href="{{asset('images/birth_certificate').'/'.$usersMeta->tutor_profile->birth_certificate}}"
                               title="ImageName">
                                {{($usersMeta->tutor_profile->birth_certificate != '') ? 'Download' : ''}}
                            </a>
                            @if ($errors->has('birth_certificate'))
                                <span class="help-block">
                                                    <strong>{{ $errors->first('birth_certificate') }}</strong>
                                                    </span>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="" id="div_checkbox">
        <button class="btn btn-success" id="sads" name="submit" type="submit">Invi</button>
    </div>
</fieldset>