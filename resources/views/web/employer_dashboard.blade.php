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

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
@endpush
@stop
