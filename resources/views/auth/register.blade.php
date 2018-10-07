@extends('master')
@section('title','Register')

@section('main')
    <center>
        <br>
        <h5 class="indigo-text">Create an account</h5>
        <br>
        <div class="container">
        <div class="z-depth-1 indigo lighten-5 row card-panel">
            <h5 class="indigo-text text-darken-4">Enter Your Information</h5>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="input-field col s12 m6 l6">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter Name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                  <div class="input-field col s12 m6 l6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Enter Email">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m6 l6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Enter Password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                  <div class="input-field col s12 m6 l6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="col s12 btn btn-large waves-effect indigo">Register</button>
                </div>                
            </form>
        </div>
    </div>
</center>
<br>
@endsection
