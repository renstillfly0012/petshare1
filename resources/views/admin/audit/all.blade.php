@extends('layouts.admin')

@section('content')

@foreach ($logs as $log)
<p>{{ $log->id }}: {{ $log->causer_id }} {{ $log->description }}</p>
<p>{{ $log->log_name }}</p>
<p>{{ $log->description }}</p>
<p>{{ $log->subject_type }}</p>
<p>{{ $log->subject_id }}</p>
<p>{{ $log->causer_type }}</p>
<p>{{ $log->causer_id }}</p>
<p>{{ $log->properties }}</p>
<p>{{ $log->created_at }}</p>
@endforeach

@endsection