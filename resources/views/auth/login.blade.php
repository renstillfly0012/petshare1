@extends('layouts.app')

<style>
    #login_container {
        height: 100%;


    }

    #login_card {
        margin-top: 167px;
        margin-left: 55px;
        height: 650px;
        width: 624px;
        /* width: 100%; */
        border-radius: 110px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    }

    #card_logo {
        /* margin-top: 55px;
        margin-left: 222px;
        margin-bottom: 166px; */
        margin: auto;
        box-shadow: 4px 4px 18px 0px rgba(0, 0, 0, 1), -4px -4px 18px 0px rgba(255, 255, 255, 1);

    }

    input[type="text"],
    input[type="password"] {
        border-radius: 30px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    }
    }

</style>
@section('content')
    <div class="container" id="login_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="login_card">
              

                    <div class="card-body">
                        <div class="text-center" style="margin-bottom: 166px;">
                            <a href="/"><img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                                    class="rounded-circle img-responsive"></a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">

                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    
                                    <label for="email"
                                        class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Email') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-md-10 offset-md-1">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label for="password"
                                        class="col-md-4 offset-md-4 col-form-label text-md-center">{{ __('Password') }}</label>



                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
