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
</head>
@if (Request::route()->getName() == 'landing')

    <body style="background: url('assets/images/landing_page.png')100%; background-size:100% 100%;">
    @else

        <body>
@endif
<div id="app">

    @if (Request::route()->getName() == 'login')
        <main class="" style="background-color: #0E401E;">
        @elseif (Request::route()->getName() == 'register')
            <main class="" style="background-color: #0E401E;">

            @else
                <main class="">

    @endif
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

<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

<script src="{{ asset('js/app.js') }}" defer></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@yield('pet_modal_script')

</body>

</html>
