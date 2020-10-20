@extends('layouts.admin')

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">All contents and their contents</h3>
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
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Content ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Section</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Title</th>
                 
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Description</th>
                 
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents as $content)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$content->id}}</td>
                                <td>{{$content->content_section}}</td>
                                <td>{{$content->content_title}}</td>
                                <td>{{$content->content_image}}</td>
                                <td>{{$content->content_description}}</td>
                                <td>
                                   <button class="btn btn-warning pr-4 editbtn">Edit</button><br>
                                    <button class="btn btn-primary deletebtn">View</button> 
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Content ID</th>
                                <th rowspan="1" colspan="1">Content Section</th>
                                <th rowspan="1" colspan="1">Content Title</th>
                                <th rowspan="1" colspan="1">Content Image</th>
                                <th rowspan="1" colspan="1">Content Description</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                   
                </div>
                <div class="col-sm-12 col-md-7">
                    {{ $contents->links() }}
                </div>
            </div>
        </div>
    
    </div>
    <!-- /.card-body -->
</div>


@endsection



<!-- Add Modal -->

