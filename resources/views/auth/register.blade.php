@extends('layouts.auth')

@section('content')
    <form class="login-form" method="POST" action="{{ route('register') }}">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>{{ __('Register') }}</h3>
        @if (session('error_msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label class="control-label{{ $errors->has('name') ? ' text-danger' : '' }}">{{ __('Name') }}</label>
            <input id="name" name="name" value="{{ old('name') }}" type="text" placeholder="Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label{{ $errors->has('email') ? ' text-danger' : '' }}">{{ __('E-Mail Address') }}</label>
            <input id="email" name="email" value="{{ old('email') }}" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>

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
            <label class="control-label{{ $errors->has('password_confirmation') ? ' text-danger' : '' }}">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Register') }}</button>
        </div>
        <div class="form-group">
            <div class="utility">
                <p class="semibold-text mt-4">
                    Already have an account? <a href="{{ route('login') }}" data-toggle="flip">Login here.</a>
                </p>
            </div>
        </div>
    </form>
@endsection
