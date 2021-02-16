@extends('layouts.auth')

@section('content')
    <form class="login-form" method="POST" action="{{ route('password.email') }}">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Reset Password</h3>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error_msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label class="control-label{{ $errors->has('email') ? ' text-danger' : '' }}">Email/Phone</label>
            <input id="email" name="email" value="{{ old('email') }}" type="text" placeholder="Email/Phone" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>{{ __('Send Password Reset Link') }}</button>
        </div>
        <div class="form-group">
            <div class="utility">
                <p class="semibold-text mt-3">
                    If you need to login <a href="{{ route('login') }}" data-toggle="flip">Click here.</a>
                </p>
            </div>
        </div>
    </form>
@endsection
