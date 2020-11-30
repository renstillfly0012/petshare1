<style>
    .main-header,
    .brand-link,
    .main-sidebar {
        /* background: rgb(45, 100, 59);
        background: linear-gradient(175deg, rgba(45, 100, 59, 1) 0%, rgba(0, 0, 0, 1) 100%); */
        background: rgb(14, 64, 30);
        background: linear-gradient(180deg, rgba(14, 64, 30, 1) 0%);
    }

    a,
    .brand-text,
    #username {
        color: #fdc370;
        
    }


    a:active {

        background-color: #000;
        color: #fdc370;

    }

    .nav-link:active {
        background-color: #000;
        color: #fdc370;
        opacity: .1;
        
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        color: #fdc370;
        background-color: rgba(0, 0, 0, .1);

    }

    .sidebar-collapse #sidebar_img {
        width: 33px;
        height: 33px;
    }

</style>


<nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
     
    </ul>

  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" id="username">{{ Auth::user()->name }}
                <i class="fa fa-caret-down" aria-hidden="true"></i> <img src="/assets/images/user{{ Auth::user()->image }} "
                    class="img-circle img-responsive" height="33px" width="33px" alt="User Image">
            </a>





            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="/viewProfile/{{Auth::user()->id}}/show" class="dropdown-item">
                    View Profile
                </a>

                <a href="/editProfile/{{Auth::user()->id}}/edit" class="dropdown-item">
                    Edit Profile
                </a>


                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item dropdown-footer">See All
                    Messages</a> --}}
                <a style="font-size:18px;" class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </div>
        </li>
        <!-- Notifications Dropdown Menu -->

    </ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="/home" class="brand-link">
        <img src="{{ asset('/assets/images/contents/pspcalogo.png') }}" alt="AdminLTE Logo" height="33px" width="33px"
            class="brand-image img-circle elevation-3 img-responsive" style="opacity: .8">
        <span class="brand-text font-weight-light">PetShare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="text-center mt-3 mb-3">
            <div class=" image">
                <img src="/assets/images/user{{ Auth::user()->image }}" class="img-circle elevation-2" alt="User Image"
                    height="100px" width="100px" id="sidebar_img">
            </div>
            <div class="info text-center mt-2">
                <h4 class="d-block" id="username">{{ Auth::user()->name }}</h4>
                <h5 class="d-block" id="username">
                    {{ Auth::user()->roles->first()->name }}
                </h5>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        


                @if (Request::route()->getName() == 'home')

                    <li class="nav-item">

                        <a href="/home" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                DASHBOARD


                            </p>
                        </a>

                    </li>
                @else

                    <li class="nav-item">

                        <a href="/home" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                DASHBOARD


                            </p>
                        </a>

                    </li>


                @endif


                @if (Route::currentRouteName() == 'pets.index')
                    <li class="nav-item has-treeview menu-close">
                        <a href="/pets" class="nav-link active">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>
                                PET MANAGEMENT
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="/pets-requests" class="nav-link">
                                    <i class="fa fa-tasks nav-icon" aria-hidden="true"></i>
                                    <p>APPOINTMENT REQUESTS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pets" class="nav-link active">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>PETS</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/pethealth/all" class="nav-link">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>PET's HEALTH RECORD</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                @elseif(Route::currentRouteName() == 'pets-requests.index')
                    <li class="nav-item has-treeview menu-close">
                        <a href="/pets" class="nav-link active">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>
                                PET MANAGEMENT
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="/pets-requests" class="nav-link active">
                                    <i class="fa fa-tasks nav-icon" aria-hidden="true"></i>
                                    <p>APPOINTMENT REQUESTS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pets" class="nav-link ">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>PETS</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/pethealth/all" class="nav-link">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>PET's HEALTH RECORD</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @elseif(Route::currentRouteAction() == 'App\Http\Controllers\petInfoController@index' || Route::currentRouteAction() == 'App\Http\Controllers\petInfoController@show')
                    <li class="nav-item has-treeview menu-close">
                        <a href="/pets" class="nav-link active">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>
                                PET MANAGEMENT
                                <i class="right fas fa-angle-left"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: block;">
                            <li class="nav-item">
                                <a href="/pets-requests" class="nav-link ">
                                    <i class="fa fa-tasks nav-icon" aria-hidden="true"></i>
                                    <p>APPOINTMENT REQUESTS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pets" class="nav-link ">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>PETS</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/pethealth/all" class="nav-link active">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>PET's HEALTH RECORD</p>
                                </a>
                            </li>

                        </ul>
                    </li>




                @else

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-paw"></i>
                            <p>
                                PET MANAGEMENT
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="/pets-requests" class="nav-link">
                                    <i class="fa fa-tasks nav-icon" aria-hidden="true"></i>
                                    <p>ADOPTION REQUESTS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/pets" class="nav-link">
                                    <i class="nav-icon fas fa-paw"></i>
                                    <p>PETS</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/pethealth/all" class="nav-link">
                                    <i class="nav-icon fas fa-file-medical"></i>
                                    <p>PET's HEALTH RECORD</p>
                                </a>
                            </li>

                        </ul>
                    </li>


                @endif


                @if (Route::currentRouteName() == 'users.index')
                    <li class="nav-item has-treeview menu-open">
                        <a href="/users" class="nav-link active">
                            <i class="nav-icon fa fa-user-alt" aria-hidden="true"></i>
                            <p>
                                USER MANAGEMENT

                            </p>
                        </a>
                    </li>

                @else
                    <li class="nav-item">
                        <a href="/users" class="nav-link ">
                            <i class="nav-icon fa fa-user-alt" aria-hidden="true"></i>
                            <p>
                                USER MANAGEMENT

                            </p>
                        </a>
                    </li>

                @endif


                @if (Request::route()->getName() == 'reports')
                    <li class="nav-item">
                        <a href="/reports" class="nav-link active">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                REPORTS OF ABUSE

                            </p>
                        </a>
                    </li>

                @else
                    <li class="nav-item">
                        <a href="/reports" class="nav-link ">
                            <i class="nav-icon fas fa-envelope"></i>
                            <p>
                                REPORTS OF ABUSE

                            </p>
                        </a>
                    </li>
                @endif

                @if (Request::route()->getName() == 'donations') 
                <li class="nav-item">
                    <a href="/donations" class="nav-link active">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                            DONATIONS

                        </p>
                    </a>
                </li>

                @else
                    <li class="nav-item">
                        <a href="/donations" class="nav-link ">
                            <i class="nav-icon fas fa-donate"></i>
                            <p>
                                DONATIONS

                            </p>
                        </a>
                    </li>
                @endif

                @if (Route::currentRouteName() == 'cms')
                <li class="nav-item">
                    <a href="/cms" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            CONTENT MANAGEMENT

                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="/cms" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            CONTENT MANAGEMENT

                        </p>
                    </a>
                </li>
                @endif

                @if (Route::currentRouteName() == 'audit')
                <li class="nav-item">
                    <a href="/audit" class="nav-link active">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            AUDIT TRAIL

                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="/audit" class="nav-link ">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            AUDIT TRAIL

                        </p>
                    </a>
                </li>
                @endif










            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
