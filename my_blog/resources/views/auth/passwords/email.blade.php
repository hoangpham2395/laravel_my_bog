@extends('layouts.app')

@section('title')
    Forget Password?
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        <p class="title">Reset Password</p>

        </p>

        <p class="login-input">
            <input id="email" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </p>

        <p class="login-button">
            <button type="submit" class="submit" name="submit">
                Send Password Reset Link
            </button>
        </p>
        <p><a href="{{ route('login') }}">Login</a> 
    </form>      
@endsection   


