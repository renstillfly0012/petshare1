@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Reports and their information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                            aria-describedby="example2_info">
                            <thead>
                                <tr role="row" class="odd text-center">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Report ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Incident Report</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Submitted At</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($reports as $report)
                                <tr role="row" class="odd text-center">
                                    <td class="sorting_1">{{$report->id}}</td>
                                    <td>{{$report->user->name}}</td>
                                    <td><img src="assets/images/reports/{{ $report->image }}" alt="User Image"
                                        class="img-responsive rounded-circle" height="129" width="129"></td>
                                    <td>{{$report->description}}</td>
                                    <td>{{$report->address}}</td>
                                    <td>{{$report->report_status}}</td>
                                    <td>{{$report->created_at}}</td>
                                    <td>
                                        <button class="btn btn-warning pr-4 editbtn">Approve</button><br>
                                        <button class="btn btn-danger deletebtn">Decline</button>
                                    </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                         
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection


@section('report_modal_script')


    <script type="text/javascript">
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.editbtn').on('click', function(e) {
                e.preventDefault();

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                var update_id = data[0];


                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve it!'
                }).then((result) => {
                    if (result.value) {


                        var data = {
                            "token": $('input[name=_token]').val(),
                            "id": update_id,


                        };

                        $.ajax({
                            type: 'put',
                            url: 'incident/' + update_id,
                            // method: 'put',
                            data: data,
                            success: function(response) {
                                
                            }
                        });

                        Swal.fire(
                            'Info',
                            'The Report has been approved.',
                            'success'
                        ).then((result) => {
                            window.location.href = "/incident/"+ update_id+ "/edit" ;
                        });


                    }
                })
            });
        });

        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.deletebtn').on('click', function(e) {
                e.preventDefault();

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                var del_id = data[0];


                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, decline it!'
                }).then((result) => {
                    if (result.value) {


                        var data = {
                            "token": $('input[name=_token]').val(),
                            "id": del_id,
                            // "appointment_status": 'decline',
                        };

                        $.ajax({
                            type: "DELETE",
                            url: 'incident/' + del_id,
                            data: data,
                            success: function(response) {

                            }
                        });

                        Swal.fire(
                            'Info',
                            'The Request has been declined.',
                            'success'
                        ).then((result) => {
                            window.location.href = "/incident/"+ del_id+ "/edit" ;
                        });


                    }
                })
            });
        });

    </script>
@endsection

