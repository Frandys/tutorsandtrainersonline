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
                                                <option value="{{$specialization->id}}" {{in_array($usersMeta->id, ($usersMeta->tutor_profile->specialization_id ? unserialize($usersMeta->tutor_profile->specialization_id) : array())) ? ' selected="selected" ' : ''}} >{{$specialization->name}}</option>
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
                                                <option value="{{$discipline->id}}" {{in_array($usersMeta->id, ($usersMeta->tutor_profile->discipline_id ? unserialize($usersMeta->tutor_profile->discipline_id) : array())) ? ' selected="selected" ' : ''}}>{{$discipline->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group ">
                                        <label class="control-label " for="course">
                                            Course
                                        </label>
                                        <select name="	course[]" id="	course" multiple="" class="form-control">
                                            @foreach(\App\Model\Course::all() as $course)
                                                <option value="{{$course->id}}" {{in_array($usersMeta->id, ($usersMeta->tutor_profile->course_id ? unserialize($usersMeta->tutor_profile->course_id) : array())) ? ' selected="selected" ' : ''}}>{{$course->name}}</option>
                                            @endforeach
                                        </select>
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


                            <div class="row">
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
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="resume">
                                            Resume
                                        </label>
                                        <input name="resume" id="resume" type="file">
                                        <a download="{{isset($usersMeta->tutor_profile->resume) ? $usersMeta->tutor_profile->resume : ''}}"
                                           href="{{asset('images/resume')}}/{{$usersMeta->tutor_profile->resume}}"
                                           title="ImageName">
                                            {{($usersMeta->tutor_profile->resume != '') ? $usersMeta->tutor_profile->resume : ''}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <fieldset>
                            <legend>Disponibilità</legend>
                            <div class="form-group ">
                                <label class="control-label " for="text1">
                                    Disponibilità Geografica
                                </label>
                                <input class="form-control" id="name3" name="name3" type="text"/>
                                <span class="help-block" id="hint_text1">
       Zona operativa prevalente
      </span>
                            </div>
                            <div class="form-group" id="div_checkbox">
                                <label class="control-label " for="checkbox">
                                    Giorni
                                </label>


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
        <script src="{{ asset("js/admin/jqueryCzMore.js") }}" type="text/javascript"></script>
        <script type="text/javascript">
            //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.
            $("#czContainer").czMore();
        </script>
    @endpush
@stop
