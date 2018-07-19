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

                    <form method="post" id="msform">
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
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="phone">
                                            Phone
                                        </label>
                                        <input class="form-control" id="phone" value="{{$usersMeta->phone}}"
                                               name="phone" type="text"/>
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
                                                <option value="{{$country['id']}}" {{ isset($usersMeta->country['0']->id) == $country['id'] ?  "selected" : '' }}>{{$country['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="address">
                                            Address
                                        </label>
                                        <textarea name="address" id="address" class="form-control"
                                                  rows="3">{{$usersMeta->tutor_profile->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Informazioni Professionali</legend>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="language">
                                            Language
                                        </label>
                                        {{--!empty($usersMeta->tutor_profile->language_id) ? in_array($lang->id,unserialize($usersMeta->tutor_profile->language_id)) ?  "selected" : '' : ""--}}
                                        <select name="language[]" id="language" multiple="" class="form-control">

                                            @foreach(\App\Model\Language::all() as $lang)
                                                <option value="{{$lang->id}}" {{in_array($lang->id, ($usersMeta->tutor_profile->language_id ? unserialize($usersMeta->tutor_profile->language_id) : array())) ? ' selected="selected" ' : ''}}>{{$lang->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="skill">
                                            Skill
                                        </label>
                                        <select name="skill[]" id="skill" multiple="" class="form-control">
                                            @foreach(\App\Model\Skill::all() as $skill)
                                                <option value="{{$skill->id}}" {{in_array($skill->id, ($usersMeta->tutor_profile->skill_id ? unserialize($usersMeta->tutor_profile->skill_id) : array())) ? ' selected="selected" ' : ''}}>{{$skill->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="specialization">
                                            Specialization
                                        </label>
                                        <select name="specialization[]" id="specialization" multiple=""
                                                class="form-control">
                                            @foreach(\App\Model\Specialization::all() as $specialization)
                                                <option value="{{$specialization->id}}" {{in_array($specialization->id, ($usersMeta->tutor_profile->specialization_id ? unserialize($usersMeta->tutor_profile->specialization_id) : array())) ? ' selected="selected" ' : ''}} >{{$specialization->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="discipline">
                                            Discipline
                                        </label>
                                        <select name="discipline[]" id="discipline" multiple="" class="form-control">
                                            @foreach(\App\Model\Discipline::all() as $discipline)
                                                <option value="{{$discipline->id}}" {{in_array($discipline->id, ($usersMeta->tutor_profile->discipline_id ? unserialize($usersMeta->tutor_profile->discipline_id) : array())) ? ' selected="selected" ' : ''}}>{{$discipline->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label" for="course">
                                            Course
                                        </label>
                                        <select name="course[]" id="course" multiple="" class="form-control">
                                            @foreach(\App\Model\Course::all() as $course)
                                                <option value="{{$course->id}}" {{in_array($course->id, ($usersMeta->tutor_profile->course_id ? unserialize($usersMeta->tutor_profile->course_id) : array())) ? ' selected="selected" ' : ''}}>{{$course->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="course">
                                            Certification
                                        </label>
                                        <input class="form-control" id="certification_id"
                                               value="{{$usersMeta->tutor_profile->certification_id}}"
                                               name="certification_id" type="text"/>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="about">
                                            About
                                        </label>
                                        <textarea id="about" name="about" class="form-control"
                                                  rows="3">{{$usersMeta->tutor_profile->about}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="resume">
                                            Resume
                                        </label>
                                        <input name="resume" id="resume" type="file">
                                        <a download="{{$usersMeta->tutor_profile->resume}}"
                                           href="{{asset('images/resume').'/'.$usersMeta->tutor_profile->resume}}"
                                           title="ImageName">
                                            {{($usersMeta->tutor_profile->resume != '') ? 'Download' : ''}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>Disponibilità</legend>

                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="well clearfix">
                                        <div id="first">
                                            @foreach($educations as $keyEdu=>$education)
                                                <div class="recordsetParent" id="parntDiv{{$keyEdu}}">
                                                    <div class="fieldRow clearfix">
                                                        <div class="col-md-5">
                                                            <div id="div_education_title" class="form-group">
                                                                <label for="education_{{$keyEdu}}_title"
                                                                       class="control-label  requiredField">
                                                                    Title<span class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls education_title">
                                                                    <input type="text" value="{{$education->title}}"
                                                                           name="education_title[{{$keyEdu}}]"
                                                                           id="education_{{$keyEdu}}_title"
                                                                           class="textinput form-control length"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div id="div_education_university" class="form-group">
                                                                <label for="education_{{$keyEdu}}_university"
                                                                       class="control-label  requiredField">
                                                                    Education University<span
                                                                            class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls education_university">
                                                                    <input type="text"
                                                                           value="{{$education->university}}"
                                                                           name="education_university[{{$keyEdu}}]"
                                                                           id="education_{{$keyEdu}}_university"
                                                                           class="textinput form-control length"/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div id="div_education_complete" class="form-group">
                                                                <label for="education_{{$keyEdu}}_complete"
                                                                       class="control-label  requiredField">
                                                                    Education Complete<span
                                                                            class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls education_complete">
                                                                    <input type="text" value="{{$education->complete}}"
                                                                           name="education_complete[{{$keyEdu}}]"
                                                                           id="education_{{$keyEdu}}_complete"
                                                                           class="textinput form-control length"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if($keyEdu > '0')
                                                            <div id="parntDiv{{$keyEdu}}" class="bunPare"
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
                                                            <div class="col-md-5">
                                                                <div id="div_education_title" class="form-group">
                                                                    <label for="education_1_title"
                                                                           class="control-label  requiredField">
                                                                        Title<span class="asteriskField">*</span>
                                                                    </label>
                                                                    <div class="controls education_title">
                                                                        <input type="text"
                                                                               name="education_title[{{$keyEdu}}]"
                                                                               id="education_1_title"
                                                                               class="textinput form-control length"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div id="div_education_university" class="form-group">
                                                                    <label for="education_1_university"
                                                                           class="control-label  requiredField">
                                                                        Education University<span
                                                                                class="asteriskField">*</span>
                                                                    </label>
                                                                    <div class="controls education_university">
                                                                        <input type="text"
                                                                               name="education_university[{{'2'}}]"
                                                                               id="education_1_university"
                                                                               class="textinput form-control length"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <div id="div_education_complete" class="form-group">
                                                                    <label for="education_1_complete"
                                                                           class="control-label  requiredField">
                                                                        Education Complete<span
                                                                                class="asteriskField">*</span>
                                                                    </label>
                                                                    <div class="controls education_complete">
                                                                        <input type="text"
                                                                               name="education_complete[{{'2'}}]"
                                                                               id="education_1_complete"
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

                                        <div id="czContainerWork">
                                            <div id="second">
                                                <div class="recordsetWork">
                                                    <div class="fieldRow clearfix">
                                                        <div class="col-md-5">
                                                            <div id="div_education_work" class="form-group">
                                                                <label for="education_1_work"
                                                                       class="control-label  requiredField">
                                                                    Title<span class="asteriskField">*</span>
                                                                </label>
                                                                <div class="controls education_work">
                                                                    <input type="text"
                                                                           name="education_work[{{'2'}}]"
                                                                           id="education_1_work"
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
                                            Invia
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script src="{{ asset("js/admin/formtowizard.js") }}" type="text/javascript"></script>
        <script src="{{ asset("js/admin/bootstrap-multiselect.js") }}" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ asset("css/bootstrap-multiselect.css") }}"/>
        <script src="{{ asset("js/admin/tutor_educations.js") }}" type="text/javascript"></script>
        <script src="{{ asset("js/admin/tutor_work.js") }}" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#language').multiselect({
                    nonSelectedText: 'Select Language',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '500px'
                });

                $('#skill').multiselect({
                    nonSelectedText: 'Select Language',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '500px'
                });

                $('#specialization').multiselect({
                    nonSelectedText: 'Select Language',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '500px'
                });

                $('#discipline').multiselect({
                    nonSelectedText: 'Select Language',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '500px'
                });

                $('#course').multiselect({
                    nonSelectedText: 'Select Language',
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                    buttonWidth: '500px'
                });
            });
            //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.

        </script>
        <script> $("#czContainer").czMore();</script>
        {{--<script> $("#czContainerWork").czMores();</script>--}}
    @endpush
@stop
