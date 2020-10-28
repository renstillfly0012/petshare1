<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('PetShare', 'PetShare') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{-- <style>
        /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }
        
        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
            }
        }
    </style> --}}

</head>
@if (Request::route()->getName() == 'landing')

    <body  id="body" >
    @else

        <body >
@endif
<div id="app">
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
   
        @yield('content')
    </main>
</div>
  

<script src="{{ asset('js/app.js') }}" defer></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_APIKEY')}}&libraries=places,visualization&callback=initMap" async defer></script> --}}


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAreFIbOTWUhpd3UggZOUEiOZolWSigj3c&libraries=places,visualization&callback=initMap" async defer></script> 

<script src="https://www.paypalobjects.com/api/checkout.js"></script>


{{-- <script
src="https://www.paypal.com/sdk/js?client-id={{ env('SB_CLIENT_ID')}}"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script> --}}


@include('sweetalert::alert')

@yield('pet_modal_script')

</body>

</html>
