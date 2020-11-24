@extends('layouts.admin')

<style>


</style>

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Pet's health information</h3>
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
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Veterinarian</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Action</th>
            
                            </tr>
                        </thead>
                        <tbody>
                          
                            @foreach($petinfos as $petinfo)
                            <tr role="row" class="odd text-center">
                                <td class="sorting_1">{{$petinfo->id}}</td>
                                
                                <td>{{$petinfo->pet_owner_id != null ? $petinfo->pet_ownder_id : 'None'}}</td>
                                <td>{{$petinfo->pet_id}}</td>
                                <td>{{$petinfo->pet_allergies}}</td>
                                 <td>{{$petinfo->pet_existing_conditions}}</td>
                                <td>{{$petinfo->vet_id}}</td>

 
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