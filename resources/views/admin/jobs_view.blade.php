@extends('layouts.admin.dashboard')
@section('page_heading','Tutor List')
@section('section')
    @include('message.message')

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">

                    <table class="table table-bordered" id="users-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                             <th>Employer Name</th>
                            <th>Created At</th>
                           <th>Actions</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function () {
                oTable = $('#users-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ url('/admin/view_jobs') }}",
                    "columns": [
                        { data: 'DT_Row_Index', name: 'DT_Row_Index' },
                        {data: 'title', name: 'title'},
                         {data: 'employer.first_name', name: 'employer.first_name'},
                        {data: 'created_at', name: 'created_at'},
                       {data: 'actions', name: 'actions', orderable: false, searchable: false}


                    ]
                });

            });

            //Delete table
            $(document).on('click', '#job_del', function () {
                var answer = confirm('Are you sure you want to delete job ?');
                if (!answer) {
                    return 0;
                }
                 $.ajax({
                    type: 'DELETE',
                    url: "{{url('/admin/job/')}}" + '/' + $(this).data("index"),
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        </script>
    @endpush
@stop
