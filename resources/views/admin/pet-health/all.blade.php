@extends('layouts.admin')

<style>


</style>

@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pets">Pets</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/pethealth/all">Health Records</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
</nav>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Pet's health information</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    Filter By:
                    <select  id="form" onchange="type = this.value;">
                    <option value="/pethealth/all?type=name">Name</option>  
                    <option value="/pethealth/all?type=pet_id">Petcode</option>  
                    <option value="/pethealth/all?all" >All</option> 
                    <option value="/pethealth/all">Default</option>
                    <option value="/pethealth" selected style="display: none"   ></option>
                </select>
                    <input input style="font-size:20px" id="selected_text" type="text" class="form-control mt-2" />
                <button class="btn bg-navy btn-flat mt-2 mb-5" id="submitText" onclick="filterByText()" target="_blank" >Filter</button>

                </div>
                <div class="col-md-8"></div>
                <div class="col-sm-12 col-md-2 ">
                    <div class="float-right">
                        <button class="btn bg-maroon btn-flat mt-2 mt-5" id="printQuery" onclick="printByQuery()" target="_blank" >PRINT PDF</button>
                    </div>   
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row" class="odd text-center">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Pet Health ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Pet Owner</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Pet</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Allergies</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Exisiting Conditions</th>
                                    {{-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Veterinarian</th>--}}
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" 
                                    aria-label="Browser: activate to sort column ascending">Action</th>
            
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($petinfos as $petinfo)
                            <tr role="row" class="odd text-center">
                                <td class="sorting_1">{{$petinfo->id}}</td>
                                
                                <td>{{$petinfo->pet_owner_id != null ? $petinfo->user->name : 'None'}}</td>
                                <td>{{$petinfo->pets->name}}</td>
                                <td>{{$petinfo->pet_allergies}}</td>
                                 <td>{{$petinfo->pet_existing_conditions}}</td>
                                {{-- <td>{{$petinfo->vet_id}}</td> --}}

 
                                <td>
                                    <button class="btn btn-warning  editbtn mb-2">Edit</button><br>
                                    <a class="btn btn-primary " href="view/{{$petinfo->pet_id}}">View</a><br>
                                   
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    {{ $petinfos->links() }}
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



<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">

                <div style="color:#fdc370; background-color:#2d643b" class="card">
                    <div class="card-header">
                        <h3 class="card-title" id="editModal"><i class="fas fa-paw"></i> Edit Pet Health Record</h5>
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

                  
                    <form id="editForm" action="/pethealth" method="POST" >
                        @csrf
                        @method('PUT')


                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Pet Owner</span>
                            </div>
                            {{-- <input id="edit_pet_name" type="text"
                                class="form-control @error('pet_name') is-invalid @enderror" name="edit_pet_name"
                                value="{{ old('edit_pet_name') }}" autocomplete="edit_pet_name" autofocus> --}}
                                <select class="form-control" name="pet_owner_id" form="editForm">
                                    @foreach ($users as $user)
                                    <option id="selected" value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                    <option value="null">None</option>
                                    <option selected style="display: none"></option>
                                  </select>

                            @error('edit_pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>




                        <div class="input-group  mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text pr-3">&nbsp;&nbsp;Pet Name
                                </span>
                            </div>
                            <input id="pet_name"
                                class="form-control @error('pet_name') is-invalid @enderror" name="pet_name"
                                value="{{ old('pet_name') }}" autocomplete="pet_name" readonly>

                            @error('pet_name')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Existing Allergies') }}</span>


                            </div>

                            <textarea id="pet_allergies" name="pet_allergies" form="editForm"
                                class="form-control @error('pet_allergies') is-invalid @enderror" rows="3"
                                value="{{ old('pet_allergies') }}" placeholder="Enter Existing Allergies"
                                autofocus></textarea>
                   

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Existing Conditions') }}</span>


                            </div>

                            <textarea id="pet_existing_conditions" name="pet_existing_conditions" form="editForm"
                                class="form-control @error('pet_existing_conditions') is-invalid @enderror" rows="3"
                                value="{{ old('pet_existing_conditions') }}" placeholder="Enter Existing Conditions"
                                autofocus></textarea>
                   

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
</div>


@endsection





<script>

   
    function filterByText(){
        var type = document.getElementById("form").value;
        var text = document.getElementById("selected_text").value;
        // console.log(type+"&text="+text);
        if(text !== null && text !== ''){
        window.location.href = type+"&text="+text;
        }
        if(type === '/pethealth/all?all'){
            console.log(type);
            window.location.href = type;
        }
        if(type === '/pethealth/all'){
            console.log(type);
            window.location.href = type;
        }

        
      
    }


    function printByQuery(){
        var url = window.location.href;
        var newUrl = url.substring(url.indexOf("?"));
    // console.log(newUrl == url);
        if(newUrl != url){
    window.open("/print/pethealth"+newUrl);
        }
    
    }


  
    
    </script>


@section('pet_modal_script')
<script type="text/javascript">
          $(document).ready(function() {

$('.editbtn').on('click', function() {
    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    // var imgsrc = $(this).closest('tr').find("img");
    // var img = imgsrc.attr("src")
    // console.log(img);
    // var imgstr = img.slice(14);
    // console.log(imgstr);
    console.log(data);


    $('#updateID').val(data[0]);
    // $('#rowImage').attr("src", img);
    // $('#edit_pet_name').val(data[1]);
    // if(){
        
    // }
    // document.getElementById("selected").selected = "true";
    $('#pet_name').val(data[2]);
    $('#pet_allergies').val(data[3]);
    $('#pet_existing_conditions').val(data[4]);
    // $('#edit_pet_status').val(data[7]);
    // $('#imageName').attr('value', imgstr);
    $('#editForm').attr('action', '/pethealth/update/' + data[0]);
    // $('#editImageForm').attr('action', '/pets/' + data[0]);
    $('#editModal').modal('show');


});



});
</script>
@endsection