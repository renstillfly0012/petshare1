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
    
<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
<!-- Font Awesome icons (free version)-->
<script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link href="css/styles.css" rel="stylesheet" />
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
    @yield('header_of_landing')

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
                @case('surrender')
                <main class="" style="background-color: #989898;" >
                @break
    @default
    <main class="">
            
    @endswitch
    {{-- @include('includes.navbar') --}}
    @include('includes.navbar1')
   
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

    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


@include('sweetalert::alert')

@yield('pet_modal_script')

</body>

</html>
