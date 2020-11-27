@extends('layouts.admin')

@section('content')

<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><a href="/audit">Audit Trails</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>List</strong></li>
                            </ol>
  </nav>

@foreach ($logs as $log)


<div class="callout callout-warning">
    <h5>{{ $log->id }}:  {{ $log->created_at }}<br>
        User ID: {{ $log->causer_id }}</h5>

    <p>
    {{ $log->description }} {{ $log->log_name }} with an ID of {{$log->subject_id}}<br> 
        {{ $log->properties }} <br>
      
    </p>
  </div>

@endforeach

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
    {{ $logs->links() }}
</div>

@endsection