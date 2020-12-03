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
                
                    <div class="col-sm-12">
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
                                    {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                    <tr role="row" class="odd text-center">
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->user_id != null ? $appointment->user->name : $appointment->name}}</td>
                                        <td>{{ $appointment->image }}</td>
                                        <td>{{ $appointment->requested_pet_id != null ? $appointment->pet->name : "None"}}</td>
                                        <td>{{ $appointment->requested_date }}</td>
                                        <td>{{ $appointment->appointment_type }}</td>
                                        {{-- <td>{{ $appointment->appointment_type }}</td> --}}
                                        <td>{{ $appointment->appointment_status}}</td>
                                        {{-- <td>
                                            <button class="btn btn-warning pr-4 editbtn">Approve</button><br>
                                            <button class="btn btn-danger deletebtn">Decline</button>
                                        
                                        </td> --}}
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



 <script type="text/javascript">
      window.onload = function() { window.print(); }
      window.onafterprint = function(){
          window.close();
    // console.log("Printing completed...");
}

 </script>

 