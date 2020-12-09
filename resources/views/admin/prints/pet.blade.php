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
                                        aria-label="Engine version: activate to sort column ascending">Staycation at PSPCA
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Pet Status
                                    </th>
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
                                                <img src="/assets/images/pets/{{ $pet->image }}" alt="Pet Image"
                                                class="rounded-circle" height="129" width="129">
                                            @endif
                                        </td>
                                  
                                        <td>{{ $pet->age }}</td>
                                        <td>{{ $pet->breed }}</td>
                                        <td>{{ $pet->description }}</td>
                                 
                                        <td>
                                            {{ $pet->status != 'Adopted' ? $pet->created_at->diffInDays(now(),false) : 'None' }}
                                        </td>
                                   
                                        <td>{{ $pet->status }}</td>

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
