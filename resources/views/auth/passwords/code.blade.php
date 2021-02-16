@extends('layouts.auth')

@section('content')
    <form class="login-form" method="POST" action="{{ url('password/reset-code') }}">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Reset Code</h3>
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
            <label class="control-label{{ $errors->has('code') ? ' text-danger' : '' }}">Enter Code</label>
            <input id="code" name="code" value="{{ old('code') }}" type="text" placeholder="Code" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" required autofocus>
            <input type="hidden" name="phone" id="phone" value="{{ $phone }}">
            @if ($errors->has('code'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Submit</button>
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
