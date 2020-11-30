@extends('layouts.app')

<style>

</style>
@section('content')
    <div class="container" id="login_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="login_card">
              

                    <div class="card-body">
                        <div class="text-center mb-5" style="margin-bottom: 0px;">
                        <a href="/"><img src="assets/images/contents/{{$contents[0]->content_image}}" alt="" id="card_logo"
                                    class="rounded-circle img-responsive"></a>
                                   
                        </div>
                        <h3 class="text-center mb-5" ><b >Login</b></h3>
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
                                    
                                    
                                </div>
                                <label for="email"
                                        class="col-md-4 offset-md-4  col-form-label ml-5 pl-4">{{ __('Email') }}</label>
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
                                </div>
                                <label for="password"
                                        class="col-md-4 offset-md-4 col-form-label ml-5 pl-4">{{ __('Password') }}</label>
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
