<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('PetShare', 'PetShare') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/googlemap.css') }}" rel="stylesheet"> --}}


</head>

<body class="hold-transition sidebar-mini layout-fixed" >
    <div class="wrapper">

        <!-- Navbar -->
        @include('includes.admin-navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" >
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content"  >
                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        {{-- <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer> --}}

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->



    {{-- <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    --}}

    <script src="{{ asset('js/app.js') }}" defer></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    {{-- <script src="{{ asset('js/googlemap.js') }}" defer></script> --}}

 
    @yield('user_modal_script')
    @yield('pet_modal_script')
    @yield('report_modal_script')
    @yield('cms_modal_script')

    @include('sweetalert::alert')

  

</body>

</html>
