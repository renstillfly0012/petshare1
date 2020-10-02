@extends('layouts.app')
<style>

</style>

@section('content')
    <div class="container" id="Register_container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" id="register_card">
                    {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                    <div class="card-body">
                        <div class="text-center" style="margin-bottom: 22px;">
                            <a href="/"><img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                                    class="rounded-circle img-responsive"></a>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">


                                <div class="col-md-10 offset-md-1">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback text-center " role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="name"
                                        class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Name') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-10 offset-md-1">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="email"
                                        class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('E-Mail Address') }}</label>
                                </div>
                            </div>



                            <div class="form-group row">


                                <div class="col-md-10 offset-md-1">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="password"
                                        class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Password') }}</label>
                                </div>
                            </div>

                            <div class="form-group row">


                                <div class="col-md-10 offset-md-1">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                                <label for="password-confirm"
                                    class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="form-group row mb-0 ">
                                <div class="col-md-2 offset-md-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
