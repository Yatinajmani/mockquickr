@extends('master')
@section('title','Login')

@section('main')
    <center>
        <br>
        <h5 class="indigo-text">Please, login into your account</h5>
        <br>
        <div class="container">
        <div class="z-depth-1 indigo lighten-5 row card-panel" style="width: 30%">
          <form class="col s12" method="post" action="{{ route('login') }}">
            @csrf
            <div class='row'>
              <div class='input-field col s12'>
                <input name="email" value="{{ old('email') }}" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter Your Email"/>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s12'>
                <input name="password" type="password" class="validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Enter Your Password"/>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
              </div>
              <label style='float: right;'>
                <a class='indigo-text' href="{{ route('password.request') }}"><b>Forgot Password?</b></a>
                </label>
            </div>
            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class="col s12 btn btn-large waves-effect indigo">Login</button>
              </div>
            </center>
          </form>
          <h5 class="indigo-text">or</h5>
          <br>
          <a class="col s12 btn btn-large waves-effect indigo darken-4" href="{{ route('register') }}">Register Now!</a>
        </div>
      </div>
    </center>
      <br>

@endsection
