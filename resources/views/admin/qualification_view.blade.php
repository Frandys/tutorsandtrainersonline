@extends('layouts.admin.dashboard')
@section('page_heading','Qualification List')
@section('section')
    @include('message.message')

    <a href="#" id="addCat" class="btn btn-square btn-option3 btn-icon wdth red_btn"><i
                class="fa fa-plus-circle" aria-hidden="true"></i></a>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Sub Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$categorie)
                            @if($categorie->sub_level_id == '')
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$categorie->level}}</td>
                                    <td></td>
                                    <td>{!! '<a   href="#" data-index="'.$categorie->level.'" name="tab" id="editCat"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a>' !!}</td>
                                    <td>{!! '<a   href="#" data-index="'.$categorie->id.'" name="cat_del"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-trash"></i></a>' !!}</td>
                                </tr>
                                @foreach($categorie->childrenLevels as  $categorieChild)

                                    <tr>
                                        <td>{{$count++}}</td>
                                        <td>{{"("}}{{$categorie->level}}{{")"}} {{' -> '}}</td>
                                        <td>{{$categorieChild->level}}</td>
                                        <td>{!! '<a   href="#" data-index="'.$categorieChild->level.'" name="tab"  id="editCat" class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-edit"></i></a>' !!}</td>
                                        <td>{!! '<a   href="#" data-index="'.$categorieChild->id.'" name="cat_del"  class="btn btn-square btn-option3 btn-icon wdth red_btn"><i class="fa fa-trash"></i></a>' !!}</td>

                                    </tr>
                        @endforeach

                        @endif
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Sub Name</th>
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

                            <div class="form-group" id="RadiaLable">
                                <label>Click yes to add SubCtegory</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="certificate_cat" id="certificate_cat" value="0">No
                                    </label>
                                    <label>
                                        <input type="radio" name="certificate_cat" id="certificate_cat" value="1">Yes
                                    </label></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group ">
                                <label class="control-label " for="nameCat">
                                    Category Name
                                </label>
                                <input id="nameCheck" hidden name="nameCheck" type="text">
                                <div id="catRadio" class="controls certificates_categorie">
                                    <select name="certificates_categorie" id="certificates_categorie"
                                            class="selectpicker length form-control">
                                        @foreach($categories as $key=>$categorie)
                                            @if($categorie->sub_level_id == '')
                                                <option value="{{$categorie->id}}">{{$categorie->level}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <input class="form-control" placeholder="Name" id="nameCat" name="nameCat" type="text">
                            </div>
                        </div>
                        <button class="btn btn-success" id="submitCat" name="submit" type="button">Submit</button>
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
            $("input:radio[name=certificate_cat]").click(function () {
                var flag = $(this).val();
                if (flag == '0') {
                    $('#catRadio').hide();
                } else {
                    $('#catRadio').show();
                }
            });
            $(document).ready(function () {
                $('#example').DataTable();
            });

            $(document).ready(function () {
                $("body").on("click", "#editCat", function (event) {

                });
            });

            $("#addCat").on("click", function () {
                $('#nameCat').val('');
                $('#nameCheck').val('');
                $('#catRadio').show();
                $('#RadiaLable').show();
                $('#myModal').modal("toggle");
            });


            //Delete table

            $("a[name=cat_del]").on("click", function () {

                var answer = confirm('Are you sure you want to delete language ?');
                if (!answer) {
                    return 0;
                }

                $.ajax({
                    type: 'DELETE',
                    url: "{{url('/admin/qualification/')}}" + '/' + $(this).data("index"),
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
                $('#nameCat').val(a);
                $('#nameCheck').val(a);
                $('#catRadio').hide();
                $('#RadiaLable').hide();
                $('#myModal').modal("toggle");

            });

            $(document).on('click', '#submitCat', function () {

                if ($('#nameCheck').val() == '') {
                    var type = 'POST';
                    var url = "{{url('/admin/qualification')}}"
                } else {
                    var type = 'PUT';
                    var url = "{{url('/admin/qualification/')}}" + '/' + $('#nameCheck').val();
                }
                var radioVal = $("input[name='certificate_cat']:checked").val();
                if ($("input[name='certificate_cat']:checked").val() == '0') {
                    var nameCatId = '';
                } else {
                    nameCatId = $('#certificates_categorie').val();
                }

                $.ajax({
                    type: type,
                    url: url,
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'nameCat': $('#nameCat').val(),
                        'nameCatId': nameCatId,
                        'radioVal': radioVal,
                    },
                    success: function (data) {
                        if (data.success == '0') {
                            alert(data.errors);
                        }
                        if (data.success == '1') {
                            $('#myModal').modal("toggle");
                            location.reload();
                         }
                    }
                });
            });
        </script>

    @endpush
@stop