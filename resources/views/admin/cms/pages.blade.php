@extends('layouts.admin')

@section('content')

<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/cms">CMS</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">All contents and their contents</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="text-right ml-3">
                    Filter By:
                    <a href="/cms?section=Header">Header</a> | 
                    <a href="/cms?section=Section_Adopt">Section_Adopt</a> |  
                    <a href="/cms?section=Section_Report">Section_Report</a> |  
                    <a href="/cms?section=Event">Events</a> |
                    <a href="/cms?section=Feedback">Feedbacks</a> |
                    <a href="/cms?section=Contact Us">Contacts</a> |
                    <a href="/cms?section=Logo">Logo</a> |

                    <a href="/cms">Reset</a>
                    
                    </div>
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table id="example2" class="table table-bordered table-hover dataTable " role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row" class="odd text-center">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Content ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Section</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Text</th>
                 
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Image</th>
                                
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Description</th>

                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Content Dates</th>
                 
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents as $content)
                            <tr role="row" class="odd text-center">
                                <td class="sorting_1">{{$content->id}}</td>
                                <td>
                                    {{$content->content_section}}
                                </td>
                                <td>{{$content->content_title}}</td>
                                <td>{{$content->content_text}}</td>
                                <td class="text-center">
                                    @if($content->content_image != '')
                                    <img src="assets/images/contents/{{$content->content_image}}" alt=""
                                    class="img-responsive rounded-circle" height="129" width="129">
                                    @else
                                    
                                    <img src="assets/images/contents/{{$content->content_image}}" style="display:none;" alt=""
                                    class="img-responsive rounded-circle" height="129" width="129">
                                    @endif
                                </td>
                                <td>{{$content->content_description}}</td>
                                <td>{{$content->content_date}}</td>
                                <td>
                                   <button class="btn btn-warning pr-4 editbtn">Edit</button><br>
                                    
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
                    {{ $contents->links() }}
                </div>
            </div>
        </div>
    
    </div>
    <!-- /.card-body -->
</div>


@endsection



<!-- Edit Modal -->
<div class="modal fade" id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="">

                <div style="color:#fdc370; background-color:#2d643b" class="card">
                    <div class="card-header">
                        <h3 class="card-title" id="editModal"><i class="fas fa-user"></i> Edit Content</h5>
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

                    <form id="editForm" action="/cms" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="input-group">
                            <div class="col-md-2 offset-md-4">
                                <img class="mb-4 text-center rounded-circle" src="" alt="User Image" id="rowImage"
                                    height="129px" width="129px">
                                    
                                <input class="mb-4" type="file" name="edit_image" id="imageName" value="" accept="image/*">

                                @error('edit_image')
                                <span class="invalid-feedback text-center" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>

                        
                        <div class="input-group ">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Section Name</span>
                            </div>
                            <input id="edit_content_section" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="edit_content_section"
                                value="{{ old('edit_content_section') }}" autocomplete="edit_content_section" autofocus >

                            @error('edit_content_section')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Content Title</span>
                            </div>
                            <input id="edit_content_title" type="text"
                                class="form-control @error('edit_content_title') is-invalid @enderror" name="edit_content_title"
                                value="{{ old('edit_content_title') }}" autocomplete="edit_content_title" autofocus>

                            @error('edit_content_title')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">{{ __('Content Text') }}</span>


                            </div>

                            <textarea id="edit_content_text" name="edit_content_text"
                                class="form-edit_content_text @error('edit_content_text') is-invalid @enderror" rows="3"
                                value="{{ old('edit_content_descredit_content_textiption') }}" autofocus></textarea>
            

                            @error('edit_content_text')
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

                            <textarea id="edit_content_description" name="edit_content_description"
                                class="form-control @error('edit_content_description') is-invalid @enderror" rows="3"
                                value="{{ old('edit_content_description') }}" autofocus></textarea>
            

                            @error('edit_content_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="input-group mt-4">
                            <div class="input-group-prepend">
                                <span style="color:#fdc370; background-color:#2d643b;"
                                    class="input-group-text">Content Date</span>
                            </div>
                            <input id="edit_content_date" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="edit_content_date"
                                value="{{ old('edit_content_date') }}" autocomplete="edit_content_date" autofocus>

                            @error('edit_content_date')
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


@section('cms_modal_script')
  
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
                console.log(data[1]);
    
    
                $('#updateID').val(data[0]);
                $('#rowImage').attr("src", img);
                $('#edit_content_section').val(data[1].trim());
                $('#edit_content_title').val(data[2]);
                $('#edit_content_text').val(data[3]);
                $('#edit_content_description').val(data[5]);
                $('#edit_content_date').val(data[6]);
                $('#imageName').attr('value', imgstr);
                $('#editForm').attr('action', '/cms/' + data[0]);
                $('#editImageForm').attr('action', '/cms/' + data[0]);
                $('#editModal').modal('show');
    
    
            });
    
    });
    </script>

@endsection