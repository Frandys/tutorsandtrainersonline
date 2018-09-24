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

@push('scripts')
    <script>
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