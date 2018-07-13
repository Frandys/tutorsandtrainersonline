@extends('layouts.admin.dashboard')
@section('page_heading','View Tutor')
@section('section')
    @include('message.message')
    <div class="row">

        <div class="">
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
                                <div class="form-group ">
                                    <label class="control-label " for="name1">
                                        Nome
                                    </label>
                                    <input class="form-control" id="name1" name="name1" type="text"/>
                                </div>


                                <div class="well clearfix">

                                    <div id="first">


                                        @foreach($usersMeta->educations as $key=>$education)

                                            <div class="recordsetParent" id="parntDiv{{$key}}">
                                                <div class="fieldRow clearfix">
                                                    <div class="col-md-5">
                                                        <div id="div_education_title"  class="form-group">
                                                            <label for="education_{{$key}}_title"
                                                                   class="control-label  requiredField">
                                                                Title<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls education_title">
                                                                <input type="text" value="{{$education->title}}"
                                                                       name="education_title[{{$key}}]"
                                                                       id="education_{{$key}}_title"
                                                                       class="textinput form-control length"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div id="div_education_university" class="form-group">
                                                            <label for="education_{{$key}}_university"
                                                                   class="control-label  requiredField">
                                                                Education University<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls education_university">
                                                                <input type="text" value="{{$education->university}}"
                                                                       name="education_university[{{$key}}]"
                                                                       id="education_{{$key}}_university"
                                                                       class="textinput form-control length"/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div id="div_education_complete" class="form-group">
                                                            <label for="education_{{$key}}_complete"
                                                                   class="control-label  requiredField">
                                                                Education Complete<span class="asteriskField">*</span>
                                                            </label>
                                                            <div class="controls education_complete">
                                                                <input type="text" value="{{$education->complete}}"
                                                                       name="education_complete[{{$key}}]"
                                                                       id="education_{{$key}}_complete"
                                                                       class="textinput form-control length"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($key > '0')
                                                        <div id="parntDiv{{$key}}" class="bunPare"
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
                                                                    <input type="text" name="education_title[{{'2'}}]"
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
                                                                    <input type="text" name="education_university[{{'2'}}]"
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
                                                                    <input type="text" name="education_complete[{{'2'}}]"
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


                            </fieldset>

                            <fieldset>
                                <legend>Informazioni Professionali</legend>
                                <div class="form-group ">
                                    <label class="control-label " for="text">
                                        Specializzazioni
                                    </label>
                                    <input class="form-control" id="name2" name="name2" type="text"/>
                                    <span class="help-block" id="name2">
       es. Infermieristica, Analisi Cliniche, Fisioterapia
      </span>
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

                            </fieldset>


                        </form>
                    </div>
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
