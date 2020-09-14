@extends('layouts.app')

@section('content')

    <style>
        a:link,
        a:visited {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        img {
            object-fit: cover;
        }

        input[type="text"],
        input[type="datetime-local"] {
            border-radius: 30px;
            box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
            text-align: center;
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4" style=" margin-top:75px;">
                <h1 class="text-center">AVAILABLE
                    PETS</h1>
            </div>
            <div class="d-flex" style="margin-top:52px;">

                @foreach ($pets as $pet)


                    <div class="col-md-3">
                        <button class="btn btn-default showbtn" data-toggle="modal" data-target="#modal-xl"
                            data-pet-id="{{ $pet->id }}" data-pet-img="{{ $pet->image }}" data-pet-name="{{ $pet->name }}"
                            data-pet-age="{{ $pet->age }}" data-pet-breed="{{ $pet->breed }}"
                            data-pet-description="{{ $pet->description }}">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>{{ $pet->name }}</strong></h3>
                                    <div class="card-tools">
                                        {{-- <button type="button" class="btn btn-tool"
                                            data-card-widget="card-refresh" data-source="/pages/widgets.html"
                                            data-source-selector="#card-refresh-content"><i
                                                class="fas fa-sync-alt"></i></button> --}}
                                        <img src="assets/images/pets/{{ $pet->image }}" class="rounded img-fluid" alt="">
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body text-center">
                                    <strong>{{ $pet->name }}</strong>
                                    {{-- <strong>Age:</strong> {{ $pet->age }} <br>
                                    <strong> Breed: </strong> {{ $pet->breed }}<br>
                                    <strong> Description: </strong> <br> {{ $pet->description }}
                                    --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </button>
                    </div>

                @endforeach

            </div>

        </div>
    </div>



@endsection


<div class="modal fade show" id="modal-xl" data-backdrop="static" style="padding-right: 17px; border-radius:40px;"
    aria-modal="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong> PET PROFILE</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">



                <form method="POST" action="{{ action('adoptionController@store') }}">
                    @csrf
                    @method('POST')
                    @auth
                        <input type="hidden" id="show_user_id" name="show_user_id" value={{ Auth::user()->id }}>
                    @endauth
                    <input type="hidden" id="show_pet_id" name="show_pet_id">


                    <img src="" class="rounded-circle img-fluid mb-4" alt="PET IMAGE" id="show_pet_image"
                        name="show_pet_image">

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1">
                            <input id="show_pet_name" type="text"
                                class="form-control @error('show_pet_name') is-invalid @enderror" name="show_pet_name"
                                value="{{ old('show_pet_name') }}" autocomplete="show_pet_name" autofocus disabled>

                            @error('show_pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="show_pet_name" class="mt-3">{{ __('Name') }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1">
                            <input id="show_pet_age" type="text"
                                class="form-control @error('show_pet_age') is-invalid @enderror" name="show_pet_age"
                                value="{{ old('show_pet_age') }}" autocomplete="show_pet_age" autofocus disabled>

                            @error('emshow_pet_ageail')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="show_pet_age" class="mt-3">{{ __('Age') }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1">
                            <input id="show_pet_breed" type="text"
                                class="form-control @error('show_pet_breed') is-invalid @enderror" name="show_pet_breed"
                                value="{{ old('show_pet_breed') }}" autocomplete="show_pet_breed" autofocus disabled>

                            @error('show_pet_breed')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="show_pet_breed" class="mt-3">{{ __('Breed') }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1">
                            <input id="show_pet_description" type="text"
                                class="form-control @error('show_pet_description') is-invalid @enderror"
                                name="show_pet_description" value="{{ old('show_pet_description') }}"
                                autocomplete="show_pet_description" autofocus disabled>

                            @error('show_pet_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="email" class="mt-3">{{ __('Description') }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1" id="datepicker">
                            <input type="datetime-local" class="form-control" name="show_requested_date">


                            @error('show_pet_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="date" class="mt-3">{{ __('Date') }}</label>
                        </div>
                    </div>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Adopt</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>



@section('pet_modal_script')


    <script type="text/javascript">
        $(document).ready(function() {


            $('.showbtn').on('click', function(e) {

                var petID = $(this).data('pet-id')
                var petImg = $(this).data('pet-img')
                var petName = $(this).data('pet-name')
                var petAge = $(this).data('pet-age')
                var petBreed = $(this).data('pet-breed')
                var petDescription = $(this).data('pet-description')


                console.log(petID);
                console.log(petImg);
                console.log(petName);
                console.log(petAge);
                console.log(petBreed);
                console.log(petDescription);


                $('#show_pet_id').val(petID);
                $('#show_pet_image').attr("src", "assets/images/pets/" + petImg);
                $('#show_pet_name').val(petName);
                $('#show_pet_age').val(petAge);
                $('#show_pet_breed').val(petBreed);
                $('#show_pet_description').val(petDescription);
                // $('#edit_pet_status').val(data[6]);
                // $('#imageName').attr('value', imgstr);
                // $('#editForm').attr('action', '/pets/' + data[0]);
                // $('#editImageForm').attr('action', '/pets/' + data[0]);
                // $('#editModal').modal('show');

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
