@extends('layouts.admin.dashboard')
@section('page_heading','Course List')
@section('section')
    @include('message.message')

    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $key=>$language)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$language->name}}</td>
                                <td>{!! '<a   href="#" data-index="'.$language->name.'" name="tab" data-toggle="modal" data-target="#myModal" class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a>' !!}</td>
                                <td>{!! '<a   href="#" data-index="'.$language->id.'" name="lang_del"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-trash"></i></a>' !!}</td>
                            </tr>
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group ">
                                <label class="control-label " for="nameLang">
                                    First Name
                                </label>
                                <input class="form-control" id="nameLang" name="nameLang" type="text">
                                <input id="nameCheck" hidden name="nameCheck" type="text">
                            </div>
                        </div>

                        <button class="btn btn-success" id="submitLang" name="submit" type="button">Submit</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        <script>
            //Delete table

            $("a[name=lang_del]").on("click", function () {

                var answer = confirm('Are you sure you want to delete language ?');
                if (!answer) {
                    return 0;
                }

                $.ajax({
                    type: 'DELETE',
                    url: "{{url('/admin/language/')}}" + '/' + $(this).data("index"),
                    data: {
                        '_token': $('input[name=_token]').val(),
                    },
                    success: function (data) {
                        location.reload();
                    }
                });
            });

            $("a[name=tab]").on("click", function () {
                var a = $(this).data("index");
                $('#nameLang').val(a);
                $('#nameCheck').val(a);

            });

            $(document).on('click', '#submitLang', function () {

                $.ajax({
                    type: 'PUT',
                    url: "{{url('/admin/language/')}}" + '/' + $('#nameCheck').val(),
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'nameLang': $('#nameLang').val()
                    },
                    success: function (data) {
                        if (data.success == '0') {
                            alert(data.errors);
                        }
                        if (data.success == '1') {
                            $('#myModal').modal("toggle");
                            location.reload();
                            //   alert(data.errors);
                        }
                    }
                });
            });
        </script>

    @endpush
@stop
