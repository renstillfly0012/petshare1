@extends('layouts.app')

<style>

</style>
@section('content')
<div style="width:1593px; height:1060px; border-radius: 40px;" class="card col-md-10 offset-md-1 mt-5">
   <p style="font-size:40px; margin-left:87px;" class="mt-5"><b>EDIT PROFILE</b></p>

   <div class="card-body">
    <div class="text-center" style="margin-bottom: 22px;">
    <img src="/assets/images/{{Auth::user()->image}}" alt="" id="card_logo"
                height="229ppx" width="235px" class="rounded-circle img-fluid"><
    </div>
    <form method="POST" action="#">
        @csrf

        <div class="form-group row">


            <div class="col-md-10 offset-md-1">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>

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
                    name="email" value="{{Auth::user()->email }}" autocomplete="email">

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
                    value="{{Auth::user()->password }}" autocomplete="new-password">

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

        <div class="form-group row">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>

            <div class="col-md-2 offset-md-5 mt-2">
                <a href="/" class="btn btn-secondary" style="color:white;">
                  Cancel
                </a>
            </div>
        </div>
    </form>
</div>
</div>

@endsection