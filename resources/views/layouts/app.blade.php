<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('PetShare', 'PetShare') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{--
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    --}}


</head>
@if (Request::route()->getName() == 'landing')

    <body style="background: url('assets/images/landing_page.png')100%; background-size:100% 100%;">
    @else

        <body style="overflow: ;">
@endif
<div id="app" >

    {{-- @if (Request::route()->getName() == 'login')
        <main class="" style="background-color: #0E401E;">
        @elseif (Request::route()->getName() == 'register')
            <main class="" style="background-color: #0E401E;">

            @elseif(Request::route()->getName() == 'editProfile' ||'viewProfile' || 'incident')
                    <main class="" style="background-color: #989898;">
                        @else
                        
    @endif
    --}}

    @switch(Request::route()->getName())
    @case('login')
    <main class="" style="background-color: #0E401E;">
    @break
    @case('adminLogin')
    <main class="" style="background-color: #0E401E;">
    @break
        @case('password.request')
        <main class="" style="background-color: #0E401E;">
        @break
        @case('password.reset')
        <main class="" style="background-color: #0E401E;">
        @break
        @case('register')
        <main class="" style="background-color: #0E401E;">
        @break
                @case('editProfile')
                <main class="" style="background-color: #989898;">
                @break
                @case('viewProfile')
                <main class="" style="background-color: #989898;">
                @break
                @case('incident')
                <main class="" style="background-color: #989898;" >
                @break
    @default
    <main class="">
            
    @endswitch
    @include('includes.navbar')
    {{-- <div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <h3>{{ \Session::get('success') }}</h3>
            </div>
        @endif
    </div> --}}
        @yield('content')
    </main>
</div>

<script src="{{ asset('js/app.js') }}" defer></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
--}}

{{-- <script src="{{ asset('js/googlemap.js') }}"></script> --}}

{{-- <script>
    let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 14.6009,
      lng: 120.9881
    },
    zoom: 18
  });
}
</script> --}}
<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_APIKEY')}}&libraries=places&callback=initMap" async defer></script>

@include('sweetalert::alert')

@yield('pet_modal_script')

</body>

</html>
