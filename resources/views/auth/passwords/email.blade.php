@extends('layouts.app')


<style>
  
    #fpass_container {
        height: 100%;
    }

    #fpass_card {
        margin-top: 167px;
        margin-left: 55px;
        height: 650px;
        width: 624px;
        /* width: 100%; */
        border-radius: 110px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    }

    #card_logo {
      
        margin: auto;
        box-shadow: 4px 4px 18px 0px rgba(0, 0, 0, 1), -4px -4px 18px 0px rgba(255, 255, 255, 1);

    }

    #img_card_div{
        margin-top: 55px;
    
    margin-bottom: 166px; 
    }

    input[type="email"],
    input[type="password"] {
        border-radius: 30px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    }
    }

</style>

@section('content')
<div class="container mt-5" id="fpass_container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="fpass_card">
                <div class="text-center" id="img_card_div">
                    <a href="/"><img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                            class="rounded-circle img-responsive"></a>
                            
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <label for="email"
                                        class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('E-Mail Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
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
