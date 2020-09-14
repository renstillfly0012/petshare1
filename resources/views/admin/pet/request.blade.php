@extends('layouts.admin')

@section('content')

    <div class="card">
        <div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <b>
                        <h3>{{ \Session::get('success') }}</h3>
                    </b>
                </div>
            @endif
        </div>
        <div class="card-header">
            <h3 class="card-title">All pets and their informations</h3>
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
                        <table id="example2" class="table table-bordered table-hover dataTable table-responsive-md"
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">ID</th>
                                    {{-- <th class="sorting_asc" tabindex="0"
                                        aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Image
                                    </th> --}}
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Name</th>
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
                                    <tr role="row" class="odd">
                                        <td>{{ $appointment->id }}</td>

                                        {{-- <td class="sorting_1 text-center">
                                            <img src="assets/images/pets/{{ $appointment->image }}" alt="User Image"
                                                class="img-responsive rounded-circle" height="129" width="129">
                                        </td> --}}
                                        <td>{{ $appointment->user_id }}</td>
                                        <td>{{ $appointment->requested_pet_id }}</td>
                                        <td>{{ $appointment->requested_date }}</td>
                                        <td>{{ $appointment->appointment_type }}</td>
                                        <td>{{ $appointment->appointment_status }}</td>
                                        <td>
                                            <button class="btn btn-success pr-4 editbtn">Approve</button><br>
                                            <button class="btn btn-danger deletebtn">Decline</button>
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
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of
                            57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button ppet_age-item previous disabled" id="example2_previous"><a
                                        href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                        class="ppet_age-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                        data-dt-idx="1" tabindex="0" class="ppet_age-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="2"
                                        tabindex="0" class="ppet_age-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="3"
                                        tabindex="0" class="ppet_age-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="4"
                                        tabindex="0" class="ppet_age-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="5"
                                        tabindex="0" class="ppet_age-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2" data-dt-idx="6"
                                        tabindex="0" class="ppet_age-link">6</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                        aria-controls="example2" data-dt-idx="7" tabindex="0" class="ppet_age-link">Next</a>
                                </li>
                            </ul>
                        </div>
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



<!-- Add Modal -->
<div class="modal fade" id="addPet" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">
                {{-- <h5 class="modal-title" id="staticBackdropLabel"><i
                        class="fas fa-pet"></i> Add User</h5> --}}
                <div style="color:#fdc370; background-color:#2d643b" class="card">
                    <div class="card-header">
                        <h3 class="card-title" id="staticBackdropLabel"><i class="fas fa-paw"></i> Add Pet</h5>
                        </h3>
                        <div class="card-tools">
                            <button style="color:#fff;" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <form method="POST" action="{{ action('petController@store') }}">
                @csrf
                @method('POST')

                <input type="hidden" name="id" value="">

                <div class="modal-body">
                    <div class="card-body">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Name</span>
                            </div>
                            <input id="pet_name" type="text"
                                class="form-control @error('pet_name') is-invalid @enderror" name="pet_name"
                                value="{{ old('pet_name') }}" autocomplete="name" placeholder="Enter Pet Name"
                                autofocus>

                            @error('pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="input-group  mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text pr-3">&nbsp;&nbsp;Age
                                </span>
                            </div>
                            <input id="pet_age" type="number"
                                class="form-control @error('pet_age') is-invalid @enderror" name="pet_age"
                                value="{{ old('pet_age') }}" autocomplete="pet_age" placeholder="Enter Pet Age"
                                autofocus>

                            @error('pet_age')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Breed</span>
                            </div>
                            <input id="pet_breed" type="text"
                                class="form-control @error('pet_breed') is-invalid @enderror" name="pet_breed"
                                value="{{ old('pet_breed') }}" autocomplete="pet_breed" placeholder="Enter Pet Breed"
                                autofocus>

                            @error('pet_breed')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Description') }}</span>


                            </div>

                            <textarea id="pet_description" name="pet_description"
                                class="form-control @error('pet_description') is-invalid @enderror" rows="3"
                                value="{{ old('pet_description') }}" placeholder="Enter Pet Description"
                                autofocus></textarea>
                            {{--

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                            --}}

                            @error('password_confirmation')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>




                        {{-- <div class="form-group pt-5">
                            <div class="icheck-primary d-inline pr-5">
                                <label for="radioPrimary3">
                                    Gender
                                </label>
                            </div>
                            <div class="icheck-primary d-inline pr-5">
                                <input type="radio" id="radioPrimary1" name="r1" checked="">
                                <label for="radioPrimary1">Male
                                </label>
                            </div>
                            <div class="icheck-primary d-inline">
                                <input type="radio" id="radioPrimary2" name="r1">
                                <label for="radioPrimary2">Female
                                </label>
                            </div>

                        </div> --}}

                        {{-- <div class="custom-file mt-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">NAME</span>
                            </div>
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div> --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default border border-success"
                        data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">

                <div style="color:#fdc370; background-color:#2d643b" class="card">
                    <div class="card-header">
                        <h3 class="card-title" id="editModal"><i class="fas fa-paw"></i> Edit Pet</h5>
                        </h3>
                        <div class="card-tools">
                            <button style="color:#fff;" type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>



            <div class="modal-body">
                <div class="card-body">

                    {{-- <div class="col-md-2 offset-md-4">
                        <img class="mt-4 image-center" src="" alt="asd" id="rowImage">
                        <input type="file" name="image" id="imageName" value="">
                    </div>
                    <br />
                    <div class="input-group mt-4">

                        <form id="editImageForm" action="/pets" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <input type="file" name="image" id="imageName" value="">
                                <input type="submit" value="Upload" class="btn btn-success" style="color:#fdc370;">
                            </div>

                        </form>
                    </div> --}}

                    <form id="editForm" action="/pets" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="input-group">
                            <div class="col-md-4 offset-md-4">
                                <img class="mb-4 image-center rounded-circle" src="" alt="User Image" id="rowImage"
                                    height="129px" width="129px">
                            </div>
                            {{-- <div class="col-md-4 offset-md-2">
                                <input class="mb-4" type="file" name="edit_pet_image" id="imageName" value="">
                            </div> --}}
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Name</span>
                            </div>
                            <input id="edit_pet_name" type="text"
                                class="form-control @error('pet_name') is-invalid @enderror" name="edit_pet_name"
                                value="{{ old('edit_pet_name') }}" autocomplete="edit_pet_name" autofocus disabled>

                            @error('edit_pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="input-group  mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text pr-3">&nbsp;&nbsp;Date
                                </span>
                            </div>
                            <input id="edit_pet_age" type="number"
                                class="form-control @error('edit_pet_age') is-invalid @enderror" name="edit_pet_age"
                                value="{{ old('edit_pet_age') }}" autocomplete="edit_pet_age" autofocus>

                            @error('edit_pet_age')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Appointent Type</span>
                            </div>
                            <input id="edit_pet_breed" type="text"
                                class="form-control @error('edit_pet_breed') is-invalid @enderror" name="edit_pet_breed"
                                value="{{ old('edit_pet_breed') }}" autocomplete="edit_pet_breed" autofocus>

                            @error('edit_pet_breed')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Appointment Status</span>
                            </div>
                            <input id="edit_pet_status" type="text"
                                class="form-control @error('edit_pet_status') is-invalid @enderror"
                                name="edit_pet_status" value="{{ old('edit_pet_status') }}"
                                autocomplete="edit_pet_status" autofocus>

                            @error('edit_pet_status')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default border border-success" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-success" value="Submit" style="color:#fdc370;">
            </div>
            </form>




        </div>
    </div>
</div>



@section('pet_modal_script')


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

                var del_id = data[0];


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
                            "id": del_id,


                        };

                        $.ajax({
                            type: 'put',
                            url: 'pets-requests/' + del_id,
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

                            location.reload();
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

                            location.reload();
                        });


                    }
                })
            });
        });

    </script>
@endsection
