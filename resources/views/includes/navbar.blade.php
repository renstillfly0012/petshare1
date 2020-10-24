<style>
    #Navbar {
        background: #17321E;
    }

    #nav-link {
        color: #FDC370;
    }
    

</style>


<nav class="navbar navbar-expand-md navbar-light" id="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}" id="nav-link">
            {{ config('PetShare', 'PetShare') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @guest
            <ul class="navbar-nav mr-auto">

            </ul>

           
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">
                <!-- Authentication Links -->
               
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="#">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="#">{{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('adopt1') }}">{{ __('Adopt') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" id="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" id="nav-link"
                            href="{{ route('login') }}">{{ __('Report An Incident') }}</a>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" id="nav-link" id="paypal-button-container"
                            style="text-decoration: underline; border:none; 
                                                                                                                                background-color: rgba(0, 0, 0, .1);"
                            data-toggle="modal" data-target="#modalDonation">{{ __('Donate') }}</button>
                    </li>

                @else
                <ul class="navbar-nav">
             
                    {{-- <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="#">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="#">{{ __('Contact Us') }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" id="nav-link" href="{{ route('adopt1') }}">{{ __('Adopt') }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="nav-link"
                            href="{{ route('incident') }}">{{ __('Report An Incident') }}</a>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" id="nav-link" id="paypal-button-container"
                            style="text-decoration: underline; border:none;  
                                                                                                                                background-color: rgba(0, 0, 0, .1);"
                            data-toggle="modal" data-target="#modalDonation">{{ __('Donate') }}</button>
                    </li>
           
            </ul>
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id=" navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#fdc370;">
                            <img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" 
                                class="rounded-circle img-responsive float-right" height="33px;" width="33px;">

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/viewProfile/{{Auth::user()->id}}/show">
                                {{ __('View Profile') }}
                            </a>
                            <a class="dropdown-item" href="/editProfile/{{Auth::user()->id}}/edit">
                                {{ __('Edit Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
            </ul>
                @endguest
            
        </div>
    </div>
</nav>


<div class="modal fade show" id="modalDonation" data-backdrop="static" style="padding-right: 17px; border-radius:40px;"
    aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><strong>Donation</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                                
                <form action="{{ route('create-payment') }}" method="post">
                    @csrf
                    @auth
                {{-- <input type="hidden" id="show_user_id" name="show_user_id" value={{ Auth::user()->id }}> --}}
                     @endauth
                    <br>
                <img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                                class="rounded-circle img-responsive mb-5">
                
                <div class="form-group row">
                    <div class="col-md-10 offset-md-1">
                        @if(Auth::check() == 1)
                     
                        <input style="font-size:16px" name="donation_name" id="donation_name" type="text"
                            class="form-control @error('donation_name') is-invalid @enderror"
                            value="{{ Auth::user()->name }}" autocomplete="donation_name"
                            data-toggle="tooltip" data-placement="top" title="leave it blank if you want to be annonymous" autofocus>
                        @else
                            <input name="donation_name" id="donation_name" type="text"
                            class="form-control @error('donation_name') is-invalid @enderror"
                            value="{{ old('donation_name') }}" autocomplete="donation_name" placeholder="Write Anonymous if you want to be unknown." autofocus>
                       @endif
                       
                            @error('donation_name')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label style="font-size:20px" for="donation_name" class="mt-3">{{ __('Full Name') }}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-10 offset-md-1">
                        <input style="font-size:16px" name="donation_amount" id="donation_amount" type="text"
                            class="form-control @error('donation_amount') is-invalid @enderror"
                            value="{{ old('donation_amount') }}" autocomplete="donation_amount"  autofocus>

                        @error('donation_amount')
                        <span class="invalid-feedback text-center" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label style="font-size:20px" for="donation_amount" class="mt-3">{{ __('Amount') }}</label>
                    </div>
                </div>
               
  
            
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button ttype="submit" class="btn btn-primary">Donate</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>