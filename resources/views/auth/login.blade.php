@extends('layouts.auth')

@section('content')
    <form class="login-form" method="POST" action="{{ route('login') }}">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>{{ __('Login') }}</h3>
        @if (session('error_msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label class="control-label{{ $errors->has('email') ? ' text-danger' : '' }}">Login Id</label>
            <input id="email" name="email" value="{{ old('email') }}" type="text" placeholder="Login id" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label{{ $errors->has('password') ? ' text-danger' : '' }}">{{ __('Password') }}</label>
            <input id="password" name="password" value="{{ old('password') }}" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="utility">
                <div class="animated-checkbox">
                    <label>
                        <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}><span class="label-text">{{ __('Remember Me') }}</span>
                    </label>
                </div>
                <p class="semibold-text mb-2">
                    <a href="{{ route('password.request') }}" data-toggle="flip">{{ __('Forgot Your Password?') }}</a>
                </p>
            </div>
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Login') }}</button>
        </div>
        <div class="form-group">
            <div class="utility">
                <p class="semibold-text mt-4">
                    Don't have an account? <a href="{{ url('registration') }}" data-toggle="flip">Register here.</a>
                </p>
            </div>
        </div>
    </form>
@endsection
