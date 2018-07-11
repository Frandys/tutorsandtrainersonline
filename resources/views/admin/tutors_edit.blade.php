@extends('layouts.admin.dashboard')
@section('page_heading','View Tutor')
@section('section')
    @include('message.message')
    <div class="row">

        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-xs-12">
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
                                <div class="form-group ">
                                    <label class="control-label " for="name1s">
                                        Cognome
                                    </label>
                                    <input class="form-control" id="name1s" name="name1s" type="text"/>
                                </div>


                            </fieldset>

                            <fieldset>
                                <legend>Informazioni Professionali</legend>
                                <div class="form-group ">
                                    <label class="control-label " for="text">
                                        Specializzazioni
                                    </label>
                                    <input class="form-control" id="text" name="text" type="text"/>
                                    <span class="help-block" id="hint_text">
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
                                    <input class="form-control" id="text1" name="text1" type="text"/>
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
        <script>


            $(document).ready(function () {
                //Tutor Widget Form js
                $("#msform").formToWizard({
                    submitButton: 'submit',
                    nextBtnName: 'Avanti >>',
                    prevBtnName: '<< Indietro',
                    nextBtnClass: 'btn btn-primary next',
                    prevBtnClass: 'btn btn-default prev',
                    buttonTag: 'button',
                    progress: function (i, count) {
                        $("#progress-complete").width('' + (i / count * 100) + '%');
                    }
                })
            })

            $("#step0Next").bind("click", function (e) {

            });

        </script>
    @endpush
@stop
