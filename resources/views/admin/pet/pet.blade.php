@extends('layouts.admin')

<style>


</style>

@section('content')

<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pets">Pets</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>


    <div class="card" >

        <div class="card-header">
            <h3 class="card-title">All pets and their informations</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row ">
                    <div class="text-right ml-3">
                        Filter By:
                        <a href="/pets?breed=Aspin">Aspin</a> | 
                        <a href="/pets?breed=Puskal">Puskal</a> |  
                        <a href="/pets">Reset</a>
                        
                        </div>
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table id="example2" class="table table-bordered table-hover dataTable table-responsive-md"
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row" class="odd text-center">
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">Pet ID</th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Pet Code
                                    </th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">Image
                                    </th>
                                   
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">Age</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Breed</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Description
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">Pet Status
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pets as $pet)
                                    <tr role="row" class="odd text-center">
                                    <td>{{$pet->id}}</td>
                                    <td>{{$pet->name}}</td>

                                        <td>
                                            @if($pet->image == 'https://picsum.photos/400/400')
                                                <img src="{{ $pet->image }}" alt="Pet Image"
                                                class="rounded-circle" height="129" width="129">
                                                @else
                                                <img src="assets/images/pets/{{ $pet->image }}" alt="Pet Image"
                                                class="rounded-circle" height="129" width="129">
                                            @endif
                                        </td>
                                  
                                        <td>{{ $pet->age }}</td>
                                        <td>{{ $pet->breed }}</td>
                                        <td>{{ $pet->description }}</td>
                                        <td>{{ $pet->status }}</td>
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
                    <div class="col-sm-12 col-md-4">
                        {{-- <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing {{$pets->count()}} of
                           {{App\Pet::count()}}</div> --}}
                    </div>
                    <div class="col-sm-12 col-md-7">
                        
                        {{ $pets->links() }}
                       
                    </div>
                   
                </div>
            </div>
            <button type="button" class="btn btn-warning float-right rounded-circle" data-toggle="modal"
                data-target="#addPet">
                <i class="fas fa-plus"></i>
            </button>
        </div>
        <!-- /.card-body -->
    </div>



@endsection



<!-- Add Modal -->
<div class="modal fade" id="addPet" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
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
            <form method="POST" action="{{ action('petController@store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <input type="hidden" name="id" value="">

                <div class="modal-body">
                    <div class="card-body">

                        <div class="input-group">
                            <div class="col-md-2 offset-md-4">
                               
                                <input class="mb-4" type="file" name="pet_image" id="imageName" value="" accept="image/*">

                                @error('pet_image')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>

                        {{-- <div class="input-group">
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

                        </div> --}}


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
                                <img class="mb-4 image-center rounded-circle " src="" alt="User Image" id="rowImage"
                                    height="129px" width="129px">
                            </div>
                            <div class="col-md-4 offset-md-2">
                                <input class="mb-4" type="file" name="edit_pet_image" id="imageName" value="" accept="image/*">
                            </div>

                            @error('edit_pet_image')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Name</span>
                            </div>
                            <input id="edit_pet_name" type="text"
                                class="form-control @error('pet_name') is-invalid @enderror" name="edit_pet_name"
                                value="{{ old('edit_pet_name') }}" autocomplete="edit_pet_name" autofocus>

                            @error('edit_pet_name')
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
                                    class="input-group-text">Breed</span>
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
                                    class="input-group-text">Status</span>
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

                        {{-- <div class="form-group">
                            <label>Custom Select</label>
                            <select class="custom-select" id="edit_pet_status" name="edit_pet_status">
                                <option id="edit_pet_status" name="edit_pet_status">option 1</option>
                                <option>option 2</option>
                                <option>option 3</option>
                                <option>option 4</option>
                                <option>option 5</option>
                            </select>
                        </div> --}}

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Description') }}</span>


                            </div>

                            <textarea id="edit_pet_description" name="edit_pet_description"
                                class="form-control @error('edit_pet_description') is-invalid @enderror" rows="3"
                                value="{{ old('edit_pet_description') }}" autofocus></textarea>
            

                            @error('edit_pet_description')
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
                $('#edit_pet_name').val(data[1]);
                $('#edit_pet_age').val(data[3]);
                $('#edit_pet_breed').val(data[4]);
                $('#edit_pet_description').val(data[5]);
                $('#edit_pet_status').val(data[6]);
                $('#imageName').attr('value', imgstr);
                $('#editForm').attr('action', '/pets/' + data[0]);
                $('#editImageForm').attr('action', '/pets/' + data[0]);
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
                            url: 'pets/' + del_id,
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
