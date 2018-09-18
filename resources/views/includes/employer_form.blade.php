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
                <label class="control-label" for="company_name">
                    Company Name
                </label>
                <input class="form-control" id="company_name"
                       value="{{$usersMeta->employer_profile->company_name}}"
                       name="company_name" type="text"/>
                @if ($errors->has('company_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="company_address">
                    Company Address
                </label>
                <input class="form-control" id="company_address"
                       value="{{$usersMeta->employer_profile->company_address}}"
                       name="company_address" type="text"/>
                @if ($errors->has('company_address'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('company_address') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="contact_tel">
                    Contact tel
                </label>
                <input class="form-control" id="contact_tel"
                       value="{{$usersMeta->employer_profile->contact_tel}}"
                       name="contact_tel" type="text"/>
                @if ($errors->has('contact_tel'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_tel') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="head_office_address">
                    Head Office Address
                </label>
                <input class="form-control" id="head_office_address"
                       value="{{$usersMeta->employer_profile->head_office_address}}"
                       name="head_office_address" type="text"/>
                @if ($errors->has('head_office_address'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('head_office_address') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="authorised_user">
                    Authorised User
                </label>
                <input class="form-control" id="authorised_user"
                       value="{{$usersMeta->employer_profile->authorised_user}}"
                       name="authorised_user" type="text"/>
                @if ($errors->has('authorised_user'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('authorised_user') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="authorised_user_second">
                    Authorised User Second
                </label>
                <input class="form-control" id="authorised_user_second"
                       value="{{$usersMeta->employer_profile->authorised_user_second}}"
                       name="authorised_user_second" type="text"/>
                @if ($errors->has('authorised_user_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('authorised_user_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="contact_person">
                    Contact Person
                </label>
                <input class="form-control" id="contact_person"
                       value="{{$usersMeta->employer_profile->contact_person}}"
                       name="contact_person" type="text"/>
                @if ($errors->has('contact_person'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="head_office_contact_person">
                    Head Office Contact Person
                </label>
                <input class="form-control" id="head_office_contact_person"
                       value="{{$usersMeta->employer_profile->head_office_contact_person}}"
                       name="head_office_contact_person" type="text"/>
                @if ($errors->has('head_office_contact_person'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('head_office_contact_person') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="contact_person_second">
                    Contact Person Second
                </label>
                <input class="form-control" id="contact_person_second"
                       value="{{$usersMeta->employer_profile->contact_person_second}}"
                       name="contact_person_second" type="text"/>
                @if ($errors->has('contact_person_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_person_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="head_office_contact_person_second">
                    Head Office Contact Person Second
                </label>
                <input class="form-control" id="head_office_contact_person_second"
                       value="{{$usersMeta->employer_profile->head_office_contact_person_second}}"
                       name="head_office_contact_person_second" type="text"/>
                @if ($errors->has('head_office_contact_person_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('head_office_contact_person_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label" for="dept">
                    Dept
                </label>
                <input class="form-control" id="dept"
                       value="{{$usersMeta->employer_profile->dept}}"
                       name="dept" type="text"/>
                @if ($errors->has('dept'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('dept') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="dept_second">
                    Dept Second
                </label>
                <input class="form-control" id="dept_second"
                       value="{{$usersMeta->employer_profile->dept_second}}"
                       name="dept_second" type="text"/>
                @if ($errors->has('dept_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('dept_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label" for="contact_no">
                    Contact No
                </label>
                <input class="form-control" id="contact_no"
                       value="{{$usersMeta->employer_profile->contact_no}}"
                       name="contact_no" type="text"/>
                @if ($errors->has('contact_no'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="contact_no_second">
                    Contact No Second
                </label>
                <input class="form-control" id="contact_no_second"
                       value="{{$usersMeta->employer_profile->contact_no_second}}"
                       name="contact_no_second" type="text"/>
                @if ($errors->has('contact_no_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('contact_no_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label" for="email">
                    Email
                </label>
                <input class="form-control" id="email"
                       value="{{$usersMeta->employer_profile->email}}"
                       name="email" type="text"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label" for="email_second">
                    Email Second
                </label>
                <input class="form-control" id="email_second"
                       value="{{$usersMeta->employer_profile->email_second}}"
                       name="email_second" type="text"/>
                @if ($errors->has('email_second'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email_second') }}</strong>
                                    </span>
                @endif
            </div>
        </div>


        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label" for="company_vat_reg_no">
                    Company VAT REG No
                </label>
                <input class="form-control" id="company_vat_reg_no"
                       value="{{$usersMeta->employer_profile->company_vat_reg_no}}"
                       name="company_vat_reg_no" type="text"/>
                @if ($errors->has('company_vat_reg_no'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('company_vat_reg_no') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="company_reg_no">
                    Company Reg No
                </label>
                <input class="form-control" id="company_reg_no"
                       value="{{$usersMeta->employer_profile->company_reg_no}}"
                       name="company_reg_no" type="text"/>
                @if ($errors->has('company_reg_no'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('company_reg_no') }}</strong>
                                    </span>
                @endif
            </div>
        </div>
    </div>

</fieldset>

<fieldset>
    <legend>Informazioni Professionali</legend>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Will the Tutor be required to travel from different locations/sites?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked  name="different_locations" id="different_locations"
                               value="0" {{ $usersMeta->employer_profile->different_locations == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="different_locations" id="different_locations"
                               value="1" {{ $usersMeta->employer_profile->different_locations == '1' ?  "checked" : '' }} >Yes
                    </label></div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="phone">
                    Phone
                </label>
                <input class="form-control disable_different_locations" id="phone"
                       value="{{$usersMeta->phone}}"
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
                <input class="form-control disable_different_locations" id="city"
                       value="{{$usersMeta->employer_profile->city}}"
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
                <input class="form-control disable_different_locations"
                       value="{{$usersMeta->employer_profile->state}}"
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

                <select name="country" id="country"
                        class="form-control disable_different_locations">
                    <option value="">Select</option>
                    @foreach(\App\Model\Country::all() as $country)
                        <option value="{{$country['id']}}" {{ $usersMeta->employer_profile->country_id == $country['id'] ?  "selected" : '' }}>{{$country['name']}}</option>
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
                <input class="form-control disable_different_locations"
                       value="{{$usersMeta->employer_profile->zip}}"
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
                <textarea name="address" id="address"
                          class="form-control disable_different_locations"
                          rows="3">{{$usersMeta->employer_profile->address}}</textarea>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Do you have an onsite projector?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="onsite_projector" id="onsite_projector"
                               value="0" {{ $usersMeta->employer_profile->onsite_projector == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="onsite_projector" id="onsite_projector"
                               value="1" {{ $usersMeta->employer_profile->onsite_projector == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Do you have a wipe board?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="wipe_board" id="wipe_board"

                               value="0" {{ $usersMeta->employer_profile->wipe_board == '0' ?  "checked" : '' }} >No
                    </label>
                    <label>
                        <input type="radio" name="wipe_board" id="wipe_board"
                               value="1" {{ $usersMeta->employer_profile->wipe_board == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Do you have a flip chart and stand?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="flip_chart_and_stand" id="flip_chart_and_stand"
                               value="0" {{ $usersMeta->employer_profile->flip_chart_and_stand == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="flip_chart_and_stand" id="flip_chart_and_stand"
                               value="1" {{ $usersMeta->employer_profile->flip_chart_and_stand == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>

                    Do any of the Audience have any learning difficulties or disabilities that we
                    need to be aware of?
                </label>

                <div class="radio">
                    <label>
                        <input type="radio" checked name="disabilities" id="disabilities"
                               value="0" {{ $usersMeta->employer_profile->disabilities == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="disabilities" id="disabilities"
                               value="1" {{ $usersMeta->employer_profile->disabilities == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Do you have an IT Suite/I.T equipment available for use if necessary?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="equipment_available" id="equipment_available"
                               value="0" {{ $usersMeta->employer_profile->equipment_available == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="equipment_available" id="equipment_available"
                               value="1" {{ $usersMeta->employer_profile->equipment_available == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>
                    Is there any equipment available onsite to be used? , if not, please tell us what you would like provided?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" checked name="equipment_available_onsite" id="equipment_available_onsite"
                               value="0" {{ $usersMeta->employer_profile->equipment_available_onsite == '0' ?  "checked" : '' }} >No
                    </label> <label>
                        <input type="radio" name="equipment_available_onsite" id="equipment_available_onsite"
                               value="1" {{ $usersMeta->employer_profile->equipment_available_onsite == '1' ?  "checked" : '' }} >Yes
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label class="control-label" for="company_logo">
                    Company Logo
                </label>
                <input name="company_logo" id="company_logo" type="file">
                <a download="{{$usersMeta->photo}}"
                   href="{{asset('images/company_logo').'/'.$usersMeta->photo}}"
                   title="User photo">
                    {{($usersMeta->photo != '') ? 'Download' : ''}}
                </a>
                @if ($errors->has('company_logo'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('company_logo') }}</strong>
                                        </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>
                    Who should they report to on the day?
                </label>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="report_name">
                    Name
                </label>
                <input class="form-control valid" id="report_name"   value="{{$usersMeta->employer_profile->report_name}}"
                       name="report_name" type="text">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="report_department">
                    Department
                </label>
                <input class="form-control valid" id="report_department"
                       value="{{$usersMeta->employer_profile->report_department}}"  name="report_department" type="text">
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="additional_information">
                    Additional  Information
                </label>
                <textarea name="additional_information" id="additional_information" class="form-control valid" rows="3" >{{$usersMeta->employer_profile->additional_information}}</textarea>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group ">
                <label class="control-label " for="additional_details">
                    Enter Additional Details:
                </label>
                <textarea name="additional_details" id="additional_details" class="form-control valid" rows="3" >{{$usersMeta->employer_profile->additional_details}}</textarea>
            </div>
        </div>
    </div>
    {{--</fieldset>--}}
    {{--<fieldset>--}}
    {{--<legend>Disponibilità</legend>--}}




    <div class="form-group" id="div_checkbox">

        <div class="form-group">
            <div>
                <button class="btn btn-success" id="sads" name="submit" type="submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</fieldset>