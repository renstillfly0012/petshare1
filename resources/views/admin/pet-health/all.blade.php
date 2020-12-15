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
                <button class="btn btn-primary mt-2 mb-5" id="submitText" onclick="filterByText()" target="_blank" >Filter</button>

                </div>
                <div class="col-md-8"></div>
                <div class="col-sm-12 col-md-2 ">
                    <div class="float-right">
                        <button class="btn btn-warning mt-2 mt-5" id="printQuery" onclick="printByQuery()" target="_blank" >PRINT PDF</button>
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
                                    <a class="btn btn-primary pr-4" href="view/{{$petinfo->pet_id}}">View</a><br>
                                    {{-- <button class="btn btn-danger deletebtn">Decline</button> --}}
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