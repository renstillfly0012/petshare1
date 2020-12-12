@extends('layouts.admin')



@section('content')

<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/users">Users</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>
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
            <h3 class="card-title">All users and their informations</h3><br>
            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                   
                    <div class="col-sm-12 ">
                        <table id="example2" class="table table-bordered table-hover dataTable table-responsive-md"
                            role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row" class="odd text-center">
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
                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr role="row" class="odd text-center">
                                        <td>{{ $user->id }}</td>

                                        <td class="sorting_1 text-center">
                                        @if($user->image == 'pspcalogo.png')
                                            <img src="/assets/images/users/{{ $user->image }}" alt="User Image"
                                                class="img-responsive rounded-circle" height="129" width="129">
                                            @else
                                            <img src="assets/images/users/{{ $user->image }}" alt="User Image"
                                            class="img-responsive rounded-circle" height="129" width="129">
                                        @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles->first()->name }}</td>

                                        <td>{{ $user->email_verified_at == null ? 'Not yet but already sent one' : $user->email_verified_at }}
                                        </td>
                                        <td>{{ $user->status }}</td>

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




<script type="text/javascript">
    window.onload = function() { window.print(); }
    window.onafterprint = function(){
        window.close();
  // console.log("Printing completed...");
}

</script>
