@extends('layouts.app')

<style>

</style>
@section('content')
<div style="width:1593px; height:1060px; border-radius: 40px;" class="card col-md-10 offset-md-1 mt-5">
   <p style="font-size:40px; margin-left:87px;" class="mt-5"><b>EDIT PROFILE</b></p>

   <div class="card-body">
    <div class="text-center" style="margin-bottom: 22px;">
    <img src="/assets/images/users/{{Auth::user()->image}}" alt="" id="card_logo"
                height="229ppx" width="235px" class="rounded-circle img-fluid"><
    </div>
    <form method="POST" action="{{ action('UserController@update',Auth::user()->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group row">


            <div class="col-md-10 offset-md-1">
                <input id="edit_user_name" type="text" class="form-control @error('edit_user_name') is-invalid @enderror"
                    name="edit_user_name" value="{{ Auth::user()->name }}" autocomplete="edit_user_name" autofocus>

                @error('edit_user_name')
                <span class="invalid-feedback text-center " role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="edit_user_name"
                    class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Name') }}</label>
            </div>
        </div>

        <div class="form-group row">


            <div class="col-md-10 offset-md-1">
                <input id="edit_email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="edit_email" value="{{Auth::user()->email }}" autocomplete="edit_email">

                @error('edit_email')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="edit_email"
                    class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('E-Mail Address') }}</label>
            </div>
        </div>



        <div class="form-group row">


            <div class="col-md-10 offset-md-1">
                <input id="edit_password" type="password"
                    class="form-control @error('edit_password') is-invalid @enderror" name="edit_password"
                    value="{{Auth::user()->password }}" autocomplete="edit_password">

                @error('edit_password')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="edit_password"
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

        <div class="form-group row text-center">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>

            <div class="col-md-2 offset-md-5 mt-2 ">
                <a href="/" class="btn btn-secondary " style="color:white;">
                  &nbsp;Cancel
                </a>
            </div>
        </div>
    </form>
</div>
</div>

@endsection