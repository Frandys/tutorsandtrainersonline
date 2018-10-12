@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Employer dashboard')
@include('message.message')

<section class="inner-page-title">
    <div class="container">
        <h2>Employer dashboard</h2>
    </div>
</section>

<section class="inner-cotent">

    <div class="container">
        <div class="row">
        <div class="col-md-12 text-right">
            <button type="button" class="btn btn-primary mb-3"
                    id="myModal1">
                Book a Session
            </button>
        </div></div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Date Form - To</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($jobs as $key=>$job)
                <tr>
                    <td>{{$key+1}}</td>
                    <td><a href="tutors/{{encrypt($job->tutor_id)}}">{{$job->title}}</a></td>
                    <td>{{$job->date}}</td>
                    @foreach($job['userjobsmeta'] as  $jobMet)
                        @if($jobMet->pivot->status == '1')
                           @php   $status = '1';  @endphp
                            @continue
                        @endif
                    @endforeach
                              @if($status == '1')
                                <td>{{'Approved'}}</td>
                                @else
                                <td>{{'Pending'}}</td>
                            @endif
                </tr>
            @endforeach

            </tbody>

        </table>
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
                <form method="post"  enctype="multipart/form-data" id="insert_form">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="title">
                                    Title
                                </label>
                                <input class="form-control"
                                       name="tutor_id" value="" type="hidden"/>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="description">
                                    Description
                                </label>
                                <textarea class="form-control"
                                          name="description" value="" id="description"  ></textarea>
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                <small id="description-error"></small>
                            </span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label " for="type">
                                    File Upload
                                </label>
                                <input type="file" class="form-control" id="file" name="file">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                <span class="text-danger">
                                <small id="file-error"></small>
                            </span>
                            </div>

                        </div>
                    </div>
                    <input type="button" name="insert" id="insert" value="Book a Session" class="btn btn-success"/>
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


        $(document).ready(function () {
            $('#example').DataTable();
        });

            var disabledArr = [""];
        $("#date").daterangepicker({
            minDate: new Date(),
            timePicker: true,
            locale: {
                format: 'M/DD/Y hh:mm A'
            },
            isInvalidDate: function (arg) {
                // Prepare the date comparision
                var thisMonth = arg._d.getMonth() + 1;   // Months are 0 based
                if (thisMonth < 10) {
                    thisMonth = "0" + thisMonth; // Leading 0
                }
                var thisDate = arg._d.getDate();
                if (thisDate < 10) {
                    thisDate = "0" + thisDate; // Leading 0
                }
                var thisYear = arg._d.getYear() + 1900;   // Years are 1900 based

                var thisCompare = thisMonth + "/" + thisDate + "/" + thisYear;
                console.log(thisCompare);

                if ($.inArray(thisCompare, disabledArr) != -1) {
                    return arg._pf = {userInvalidated: true};
                }
            }
        }).focus();


        $('#myModal1').click(function (e) {
            $('#myModal').modal('toggle');
            $("#insert_form")[0].reset();
            $('#title-error').html("");
            $('#date-error').html("");
            $('#specialist-error').html("");
            $('#qualified_levels-error').html("");
            $('#type_levels-error').html("");
            $('#description-error').html("");
            $('#file-error').html("");
        });

        $("#insert").click(function(){
        // $('#insert').on("submit", function (event) {
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
            $('#description-error').html("");
            $('#file-error').html("");
            $.ajax({
                type: "POST",
                processData: false,
                contentType: false,
                url: "{{url('/tutors')}}",
                // data: $('#insert_form').serialize(),
                data : new FormData($("#insert_form")[0]),
                success: function (data) {
                    if (data.errors) {
                        $('#title-error').html(data.errors.title);
                        $('#date-error').html(data.errors.date);
                        $('#specialist-error').html(data.errors.specialist);
                        $('#qualified_levels-error').html(data.errors.qualified_levels);
                        $('#type_levels-error').html(data.errors.type_levels);
                        $('#description-error').html(data.errors.description);
                        $('#file-error').html(data.errors.file);
                    }

                    if (data.success) {
                        $('#insert_form').trigger("reset");
                        bootoast.toast({
                            message: data.message
                        });
                        $('#myModal').modal('toggle');
                        location.reload();
                    }
                }
            });
            event.preventDefault();
        });
    </script>
@endpush
@stop
