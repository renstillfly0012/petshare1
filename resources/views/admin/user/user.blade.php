@extends('layouts.admin')

@section('content')
    <div class="card">
        <div>
            {{-- @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            {{-- @if (\Session::has('success'))
                <div class="alert alert-success">
                    <h3>{{ \Session::get('success') }}</h3>
                </div>
            @endif --}}
        </div>
        <div class="card-header">
            <h3 class="card-title">All users and their informations</h3>
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
                                        aria-label="Browser: activate to sort column ascending">User ID</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Image
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Email Address</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Role</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Verification Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Account Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd">
                                        <td>{{ $user->id }}</td>

                                        <td class="sorting_1 text-center">
                                            <img src="assets/images/{{ $user->image }}" alt="User Image"
                                                class="img-responsive rounded-circle" height="129" width="129">
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->first()->name }}</td>

                                        <td>{{ $user->email_verified_at == null ? 'Not yet but already sent one' : $user->email_verified_at }}
                                        </td>
                                        <td>{{ $user->status }}</td>
                                        <td>
                                            <button class="btn btn-warning pr-4 editbtn">Edit</button><br>
                                            <button class="btn btn-danger deletebtn">Delete</button>
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
                        {{-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$users->count()}} of
                           {{$users->count()}}</div> --}}
                    </div>
                    {{-- <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                
                            </ul>
                        </div>
                    </div> --}}
                    {{ $users->links() }}
                </div>
            </div>

            <button type="button" class="btn btn-warning float-right rounded-circle" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i>
            </button>

        </div>


        <!-- /.card-body -->
    </div>


    <!-- Button trigger modal -->



@endsection




<!-- Add Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">
                {{-- <h5 class="modal-title" id="staticBackdropLabel"><i
                        class="fas fa-user"></i> Add User</h5> --}}
                <div style="color:#fdc370; background-color:#2d643b" class="card">
                    <div class="card-header">
                        <h3 class="card-title" id="staticBackdropLabel"><i class="fas fa-user"></i> Add User</h5>
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
            <form method="POST" action="{{ action('UserController@store') }}">
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Enter Name"
                                autofocus>

                            @error('name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="input-group  mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text pr-3">&nbsp;&nbsp;EMAIL
                                </span>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Enter Email"
                                autofocus>

                            @error('email')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Password</span>
                            </div>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" autocomplete="password" placeholder="Enter Password"
                                autofocus>

                            @error('password')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Confirm Password') }}</span>
                            </div>
                            <input id="password-confirm" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" value="{{ old('password_confirmation') }}"
                                autocomplete="new-password" placeholder="Enter Confirmation Password" autofocus>
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
                        <h3 class="card-title" id="editModal"><i class="fas fa-user"></i> Edit User</h5>
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

                        <form id="editImageForm" action="/users" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <input type="file" name="image" id="imageName" value="">
                                <input type="submit" value="Upload" class="btn btn-success" style="color:#fdc370;">
                            </div>

                        </form>
                    </div> --}}

                    <form id="editForm" action="/users" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="input-group">
                            <div class="col-md-2 offset-md-4">
                                <img class="mb-4 image-center rounded-circle" src="" alt="User Image" id="rowImage"
                                    height="129px" width="129px">
                                <input class="mb-4" type="file" name="edit_image" id="imageName" value="">

                                @error('edit_image')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Name</span>
                            </div>
                            <input id="edit_user_name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="edit_user_name"
                                value="{{ old('edit_user_name') }}" autocomplete="edit_user_name" autofocus>

                            @error('edit_user_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="input-group  mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text pr-3">&nbsp;&nbsp;EMAIL
                                </span>
                            </div>
                            <input id="edit_email" type="email"
                                class="form-control @error('edit_email') is-invalid @enderror" name="edit_email"
                                value="{{ old('edit_email') }}" autocomplete="edit_email" autofocus>

                            @error('edit_email')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Password</span>
                            </div>
                            <input id="edit_password" type="password"
                                class="form-control @error('edit_password') is-invalid @enderror" name="edit_password"
                                value="{{ old('edit_password') }}" autocomplete="edit_password" autofocus>

                            @error('edit_password')
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

@section('user_modal_script')


    <script type="text/javascript">
        $(document).ready(function() {

            $('.editbtn').on('click', function() {
                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                var imgsrc = $(this).closest('tr').find("img");
                var img = imgsrc.attr("src")
                console.log(img);
                var imgstr = img.slice(14);
                console.log(imgstr);
                console.log(data);


                $('#updateID').val(data[0]);
                $('#rowImage').attr("src", img);
                $('#edit_user_name').val(data[2]);
                $('#edit_email').val(data[3]);
                $('#edit_password').val(data[4]);
                $('#imageName').attr('value', imgstr);
                $('#editForm').attr('action', '/users/' + data[0]);
                $('#editImageForm').attr('action', '/users/' + data[0]);
                $('#editModal').modal('show');


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
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {


                        var data = {
                            "token": $('input[name=_token]').val(),
                            "id": del_id,
                        };

                        $.ajax({
                            type: "DELETE",
                            url: 'users/' + del_id,
                            data: data,
                            success: function(response) {

                            }
                        });

                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
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
