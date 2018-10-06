@extends('master')

@section('main')
<div id="page-wrapper" class="sign-in-wrapper">
    <div class="graphs">
        <div class="sign-in-form">
            <div class="sign-in-form-top">
                <h1>Log in</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                <div class="signin">
                    @csrf
                    <div class="log-input">
                        <div class="log-input-left">
                            <input name="email" value="{{ old('email') }}" type="text" class="user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"placeholder="Your mail" />
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="log-input">
                        <div class="log-input-left">
                         <input name="password" type="password" class="lock form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Your Password" />
                         @if ($errors->has('password'))
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                    <a class="btn btn-link pull-right" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    <br/>
                    <br/>
                    <input type="submit">
                </div>
            </div>
        </form>
        <div class="new_people">
            <h2>For New People</h2>
            <p>Having hands on experience in creating innovative designs,I do offer design 
            solutions which harness.</p>
            <a href="{{ route('register') }}">Register Now!</a>
        </div>
    </div>
</div>
</div>
@endsection
