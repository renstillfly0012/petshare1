@extends('layouts.admin')

@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/reports">Reports</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Reports and their information</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-left ">
                            
                            Filter By:
                            <select  id="form" onchange="type = this.value;">
                            <option value="/reports?type=name">Name</option>  
                            <option value="/reports?type=email">Email</option> 
                            <option value="/reports?type=mobile_number">Mobile Number</option> 
                            <option value="/reports?all" >All</option> 
                            <option value="/reports">Default</option>
                            <option value="/reports" selected style="display: none"   ></option>
                        </select>
                    <div>
                        <input input style="font-size:20px" id="selected_text" type="text" class="form-control mt-2" />
                        <button class="btn btn-primary mt-2" id="submitText" onclick="filterByText()" target="_blank" >Filter</button>
                        <br>
                    </div>

                        <button class="btn btn-warning mt-2 mb-5" id="printQuery" onclick="printByQuery()" target="_blank" >PRINT PDF</button>
                        </div>
                        {{-- onclick="print()" --}}
           
    
                    
                  
                            <div class="float-right" id="datepicker">
                                <input style="font-size:20px" id="select_date" type="date" class="form-control mb-2" >
                                <button class="btn btn-primary mb-2 float-right" id="submitDate" href="" onclick="filterByDate()" >Filter By Date</button>
                            </div>
                          
    
                          
                        </div>
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
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
                                        aria-label="Browser: activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Mobile Number</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Incident Report</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Location</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Report Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Submitted Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($reports as $report)
                                <tr role="row" class="odd text-center">
                                    <td class="sorting_1">{{$report->id}}</td>
                                   
                                    <td>{{$report->user_id != null ? $report->user->name : $report->name}}</td>
                                 
                                    <td><img src="assets/images/reports/{{ $report->image }}" alt="User Image"
                                        class="img-responsive rounded-circle" height="129" width="129"></td>
                                        <td>{{$report->email}}</td>
                                        <td>{{$report->mobile_number}}</td>
                                    <td>{{$report->description}}</td>
                                    <td>{{$report->address}}</td>
                                    <td>{{$report->report_type}}</td>
                                    <td>{{$report->report_status}}</td>
                                    <td>{{$report->created_at}}</td>
                                    <td>
                                        <button class="btn btn-warning pr-4 editbtn">Respond</button><br>
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
                                {{ $reports->links() }}
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
<script>

   
    function filterByText(){
        var type = document.getElementById("form").value;
        var text = document.getElementById("selected_text").value;
        console.log(type+"&text="+text);
        window.location.href = type+"&text="+text;

    }

    function filterByDate(){
       
        var date = document.getElementById("select_date").value;
    window.location.href = "/reports?date="+date;
   
    }

    function printByQuery(){
        var url = window.location.href;
        var newUrl = url.substring(url.indexOf("?"));
    // console.log(newUrl == url);
        if(newUrl != url){
    window.open("/print/reports"+newUrl);
        }
    
    }
    
    </script>


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

