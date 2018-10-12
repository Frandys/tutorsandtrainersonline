@extends('layouts.dashboard')
@section('section')
@section('pageTitle', 'Tutor dashboard')

<section class="inner-page-title">
    <div class="container">
        <h2>Tutor dashboard</h2>
    </div>
</section>
<section class="inner-cotent">
    <div class="container">
        @include('message.message')

        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            {{'adsa'}}
             @foreach($jobs as $key=>$job)
                @if($job->status == '0' || $job->status == '1')
                <tr>
                    <td>{{$status+1}}</td>
                    <td>{{$job['userjobs']->title}}</td>
                    <td>{{$job->status == '0' ? 'Process' : 'Accepted'}}</td>
                    <td>
                        @if($job->status == '0')
                        <button type="button" class="announce btn btn-success float-left mr-1" data-id="{{encrypt($job->id)}}"  data-status="1"  data-toggle="modal" data-target="#deleteMerchant">Accept
                        </button>
                        <button type="button" class="announce btn btn-danger float-left mr-1" data-id="{{encrypt($job->id)}}"  data-status="2"  data-toggle="modal" data-target="#deleteMerchant">Reject
                        </button>
                            @elseif($job->status == '1')
                            <button type="button" class="announce btn btn-danger float-left mr-1" data-id="{{encrypt($job->id)}}"  data-status="2"  data-toggle="modal" data-target="#deleteMerchant">Reject
                            </button>

                            @if(strtotime($job->created_at ) >= strtotime('-3 Day',time()))
                            <button type="button" class="swap btn btn-primary float-left mr-1" data-id="{{encrypt($job['userjobs']->id)}}" >Swap Tutor
                            </button>
                          @endif
                         @endif
                    </td>
                    </td>
                    </td>
                </tr>
                @endif
            @endforeach

            </tbody>

        </table>
    </div>

    <div class="modal fade maiilModal" id="deleteMerchant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-wrap">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-secondary" data-method="delete" style="cursor:pointer;" onclick="$(this).find('form').submit();">Submit
                        <form action="{{url('tutor/change_job_status')}}" method="POST"  style="display:none">
                            <input type="hidden" id="jobid" name="jobid" value="">
                            <input type="hidden" id="status" name="status" value="">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                        </form>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <form method="post" id="insert_form">
                {{ csrf_field() }}
            <div class="modal-body">
                <select class="form-control" name="tutor_assign[]" id="tutor_assign"
                        multiple="">

                </select>
                <div id="title-error"></div>
            </div>
                <input type="hidden" id="tutor_id" name="tutor_id">
                <input type="submit" name="insert" id="insert" value="Book a Session" class="btn btn-success"/>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@push('scripts')
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
    <script>

        $('#insert_form').on("submit", function (event) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#title-error').html("");

            $.ajax({
                type: "POST",
                url: "{{url('/tutor/swap_user')}}",
                data: $('#insert_form').serialize(),
                success: function (data) {
                    if (data.errors) {
                        $('#title-error').html(data.errors);

                    }

                    if (data.success) {
                        $('#insert_form').trigger("reset");
                        bootoast.toast({
                            message: data.message
                        });
                        // $('#myModal').modal('toggle');
                        location.reload();
                    }
                }
            });
            event.preventDefault();
        });

        $(".swap").click(function(){ // Click to only happen on announce links
            $('#title-error').html("");
   var ids = $(this).data('id');
          $("#tutor_id").val(ids);
            $.ajax({
                type: 'GET',
                url: "{{url('/tutor/get_swap/')}}"+'/'+ids,
                data: {

                },
                success: function (data) {

                    $("#tutor_assign").multiselect('dataprovider', JSON.parse(data));
                }

            });

            $('#myModal').modal('show');

        });

        $(document).ready(function(){
            $(".announce").click(function(){ // Click to only happen on announce links
                $("#jobid").val($(this).data('id'));
                $("#status").val($(this).data('status'));
                $('#deleteMerchant').modal('show');
            });
        });
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
@stop