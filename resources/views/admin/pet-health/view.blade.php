@extends('layouts.admin')

<style>


</style>

@section('content')   
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $medinfos[0]->pet_id }}</h3>
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
                            <tr role="row">

                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Date</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Description</th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Diagnosis</th>
                                <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Test Performed</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Test Results</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Action</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Medication</th>
                                    <th class="sorting text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Comments</th>
            
                            </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($medinfos as $medinfo)
                            <tr role="row" class="odd text-center">
                              <td> {{ $medinfo->date }} </td>
                              <td> {{ $medinfo->description }} </td>
                              <td> {{ $medinfo->diagnosis }} </td>
                              <td> {{ $medinfo->test_performed }} </td>
                              <td> {{ $medinfo->test_results }} </td>
                              <td> {{ $medinfo->action }} </td>
                              <td> {{ $medinfo->medications }} </td>
                              <td> {{ $medinfo->comments }} </td>
                            </tr>
                                
                            @endforeach
                           
                           
                        </tbody>

                    </table>
                    <button type="button" class="btn btn-warning float-right rounded-circle" data-toggle="modal"
                    data-target="#staticBackdrop">
                    <i class="fas fa-plus"></i>
                </button>
                </div>
            </div>

        </div>
    </div>
    <!-- /.card-body -->
</div>


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
                        <h3 class="card-title" id="staticBackdropLabel"><i class="fas fa-file-medical"></i> Add Record</h5>
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
            <form method="POST" action="{{ action('petInfoController@store') }}" >
                @csrf
                @method('POST')

                <input type="hidden" name="pet_id" value="{{ $medinfo->pet_id }}">

                <input type="hidden" name="pet_info_id" value="{{ $medinfo->pet_info_id }}">

                

                <div class="modal-body">
                    <div class="card-body">




                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Date</span>
                            </div>
                            <input id="date" type="text" class="form-control @error('date') is-invalid @enderror"
                                name="date" value="{{{ now() }}}" autocomplete="date" placeholder="Enter Date"
                                autofocus readonly="readonly">

                            @error('date')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Description</span>
                            </div>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" value="{{ old('description') }}" autocomplete="description" placeholder="Enter Description"
                                autofocus>

                            @error('description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Diagnosis</span>
                            </div>
                            <input id="diagnosis" type="text" class="form-control @error('diagnosis') is-invalid @enderror"
                                name="diagnosis" value="{{ old('diagnosis') }}" autocomplete="diagnosis" placeholder="Enter Diagnosis"
                                autofocus>

                            @error('diagnosis')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Test Performed</span>
                            </div>
                            <input id="test_performed" type="text" class="form-control @error('test_performed') is-invalid @enderror"
                                name="test_performed" value="{{ old('test_performed') }}" autocomplete="test_performed" placeholder="Enter Test Performed"
                                autofocus>

                            @error('test_performed')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Test Results</span>
                            </div>
                            <input id="test_results" type="text" class="form-control @error('test_results') is-invalid @enderror"
                                name="test_results" value="{{ old('test_results') }}" autocomplete="test_results" placeholder="Enter Test Results"
                                autofocus>

                            @error('test_results')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Action</span>
                            </div>
                            <input id="action" type="text" class="form-control @error('action') is-invalid @enderror"
                                name="action" value="{{ old('action') }}" autocomplete="action" placeholder="Enter Action"
                                autofocus>

                            @error('action')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Medication</span>
                            </div>
                            <input id="medications" type="text" class="form-control @error('medications') is-invalid @enderror"
                                name="medications" value="{{ old('medications') }}" autocomplete="medications" placeholder="Enter Medication/s"
                                autofocus>

                            @error('medications')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-3">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Comments</span>
                            </div>
                            <input id="comments" type="text" class="form-control @error('comments') is-invalid @enderror"
                                name="comments" value="{{ old('comments') }}" autocomplete="comments" placeholder="Enter Comments"
                                autofocus>

                            @error('comments')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        


        



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
