@extends('layouts.app')

@section('content')

    <style>
  
        
    </style>
    <div class="container-fluid">
        <div class="col-md-4 offset-md-4" style=" margin-top:100px;">
            <h1 class="text-center">AVAILABLE
                PETS</h1>
        </div>
        <div class="row">
            <div class="text-right ml-3 mt-5">
                Filter By:
                <a href="/availablepets?breed=Aspin">Aspin</a> | 
                <a href="/availablepets?breed=Puskal">Puskal</a> |  
                <a href="/availablepets">Reset</a>
                
                </div>
            <div class="row mt-5" >

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
                                        <img src="assets/images/pets/{{ $pet->image }}" class="rounded img-fluid" alt=""  >
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
        <div class="row mt-5">
            <div class="col-sm-12 col-md-5">
           
            </div>
          
            {{ $pets->links() }}
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
            <div class="modal-body">

                <div class="row mt-5">
                <div class="col-md-6 offset-md-1">
                <img src="" class="rounded-circle img-fluid mb-4" alt="PET IMAGE" id="show_pet_image"
                name="show_pet_image">
                </div>
                 
                <div class="col-md-5">
                <p style="font-size:20px;" id="lblPetCode" for="show_pet_name" class="mt-3">{{ __('Pet Code: ') }}</p>
                <p style="font-size:20px;" id="lblPetAge" for="show_pet_age" class="mt-3">{{ __('Age: ') }}</p>
                <p style="font-size:20px;" id="lblPetBreed" for="show_pet_breed" class="mt-3">{{ __('Breed: ') }}</p>
                <p style="font-size:20px;" id="lblPetDescription"  for="show_pet_description" class="mt-3">{{ __('Description: ') }}</p>
                </div>
                </div>

                <form method="POST" action="{{ action('adoptionController@store') }}">
                    @csrf
                    @method('POST')
                    @auth
                        <input style="font-size:20px" type="hidden" id="show_user_id" name="show_user_id" value={{ Auth::user()->id }}>
                    @endauth
                    <input style="font-size:20px" type="hidden" id="show_pet_id" name="show_pet_id">


                

                    <div class="form-group row text-right">
                        <div class="col-md-10 offset-md-1">
                            <input style="font-size:20px" style="font-size:20px" id="show_pet_name" type="hidden"
                                class="form-control @error('show_pet_name') is-invalid @enderror" name="show_pet_name"
                                value="{{ old('show_pet_name') }}" autocomplete="show_pet_name" autofocus disabled >

                            @error('show_pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col-md-10 offset-md-1">
                            <input style="font-size:20px" id="show_pet_age" type="hidden"
                                class="form-control @error('show_pet_age') is-invalid @enderror" name="show_pet_age"
                                value="{{ old('show_pet_age') }}" autocomplete="show_pet_age" autofocus disabled>

                            @error('emshow_pet_ageail')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                       
                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col-md-10 offset-md-1">
                            <input style="font-size:20px" id="show_pet_breed" type="hidden"
                                class="form-control @error('show_pet_breed') is-invalid @enderror" name="show_pet_breed"
                                value="{{ old('show_pet_breed') }}" autocomplete="show_pet_breed" autofocus disabled>

                            @error('show_pet_breed')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row text-right">
                        <div class="col-md-10 offset-md-1">
                            <input style="font-size:20px" id="show_pet_description" type="hidden"
                                class="form-control @error('show_pet_description') is-invalid @enderror"
                                name="show_pet_description" value="{{ old('show_pet_description') }}"
                                autocomplete="show_pet_description" autofocus disabled>

                            @error('show_pet_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                       </div>
                    </div>

                    <?php
                    $date = new DateTime();
                    $date->modify('+7 day');
                    $dt= $date->format('Y-m-d\TH:i:s'); 
                    ?>

                    <div class="form-group row text-right">
                        <div class="col-md-10 offset-md-1" id="datepicker">
                        <input style="font-size:20px" id="select_date" type="datetime-local" class="form-control" name="show_requested_date" value="{{$dt}}" min="{{$dt}}">

                        <span id="time"></span>
                            @error('show_pet_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <label for="date" class="mt-3">{{ __('Date') }}</label>
                        </div>
                    </div>
            </div>

            
            <div class="col-md-10 offset-md-1 ">
                <div class="alert alert-warning" role="alert">
                    <strong> <p>Note: Always advanced a week for the date of the appointment.
                    Ex: today is Jan 1,2020 (monday) select Jan 8,2020 (monday)</p>
                    <br>
                    <p>Upon the reservation of the appointment, all the appointments will be subjected to evaluation. 
                        Once validated, the administrator will send a notice.<p></strong>
                  </div>
            </div>
        
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" style="color:black;">Adopt</button>
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
                // $('#show_pet_image').attr("src", petImg);
                $('#show_pet_name').val(petName);
                $('#show_pet_age').val(petAge);
                $('#show_pet_breed').val(petBreed);
                $('#show_pet_description').val(petDescription);

                lblPetCode.innerText += petName;
                lblPetAge.innerText += petAge;
                lblPetBreed.innerText += petBreed;
                lblPetDescription.innerText += petDescription;


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
                            "token": $('input style="font-size:20px"[name=_token]').val(),
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
