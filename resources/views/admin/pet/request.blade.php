@extends('layouts.admin')

@section('content')

<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pet-requests">Appointments</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">All appointment requests</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row ">
                    <div class="col-md-12">
                    <div class="float-left ">
                        
                        Filter By:
                        <select  name="form" onchange="location = this.value;">
                        <option value="/pets-requests?type=Adoption">Adoption</option>  
                        <option value="/pets-requests?type=Surrender">Surrender</option> 
                        <option value="/pets-requests?status=Pending">Pending</option>  
                        <option value="/pets-requests?status=Approved">Approved</option> 
                        <option value="/pets-requests?status=Declined">Declined</option> 
                        <option value="/pets-requests?all" >All</option> 
                        <option value="/pets-requests">Default</option>
                        <option value="/pets-requests" selected style="display: none"   ></option>
                    </select>
                    <br>
                    <button class="btn btn-warning mt-2" id="printQuery" onclick="printByQuery()" target="_blank" >PRINT PDF</button>
                    </div>
                    {{-- onclick="print()" --}}
       

                
              
                        <div class="float-right" id="datepicker">
                            <input style="font-size:20px" id="select_date" type="date" class="form-control mb-2" >
                            <button class="btn btn-primary mb-2 float-right" id="submitDate" href="" onclick="filterByDate()" >Filter By Date</button>
                        </div>
                      

                      
                    </div>
                     


                    <div class="col-sm-12 table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable table-responsive-md"
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row" class="odd text-center">
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Appoinment ID</th>
                                    {{-- <th class="sorting_asc" tabindex="0"
                                        aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Image
                                    </th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Requested Pet</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Requested Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Appointment Type
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Appointment Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr role="row" class="odd text-center">
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->user_id != null ? $appointment->user->name : $appointment->name}}</td>
                                        <td><img src="assets/images/pets/{{ $appointment->image }}" alt="Pet Image"
                                            class="rounded-circle" height="129" width="129"></td>
                                        <td>{{ $appointment->requested_pet_id != null ? $appointment->pet->name : "None"}}</td>
                                        <td>{{ $appointment->requested_date }}</td>
                                        <td>{{ $appointment->appointment_type }}</td>
                                        {{-- <td>{{ $appointment->appointment_type }}</td> --}}
                                        <td>{{ $appointment->appointment_status}}</td>
                                        <td>
                                            @if($appointment->appointment_status == 'Pending')
                                            <button class="btn btn-warning pr-4 editbtn">Approve</button><br>
                                            <button class="btn btn-danger deletebtn">Decline</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        {{-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$appointments->count()}} of
                            {{App\Appointment::count()}}</div> --}}
                    </div>
                    <div class="col-sm-12 col-md-7">
                      
                        {{$appointments->links()}}
                    </div>
                
                </div>
            </div>
            {{-- <button type="button" class="btn btn-warning float-right rounded-circle"
                data-toggle="modal" data-target="#addPet">
                <i class="fas fa-plus"></i>
            </button> --}}
        </div>
        <!-- /.card-body -->
    </div>



@endsection




@section('pet_modal_script')
    <script>

        function filterByDate(){
           
            var date = document.getElementById("select_date").value;
        window.location.href = "/pets-requests?date="+date;
       
        }

        function printByQuery(){
            var url = window.location.href;
            var newUrl = url.substring(url.indexOf("?"));
        // console.log(newUrl == url);
            if(newUrl != url){
        window.open("/print/appointments"+newUrl);
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
                            url: 'pets-requests/' + update_id,
                            // method: 'put',
                            data: data,
                            success: function(response) {
                                
                            }
                        });

                        Swal.fire(
                            'Info',
                            'The Request has been approved.',
                            'success'
                        ).then((result) => {
                            window.location.href = "/pets-requests/"+ update_id+ "/edit" ;
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
                            url: 'pets-requests/' + del_id,
                            data: data,
                            success: function(response) {

                            }
                        });

                        Swal.fire(
                            'Info',
                            'The Request has been declined.',
                            'success'
                        ).then((result) => {
                            window.location.href = "/pets-requests/"+ del_id+ "/edit" ;
                        });


                    }
                })
            });
        });

    </script>
@endsection
