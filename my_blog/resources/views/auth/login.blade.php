@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
        <p class="title">Login</p>

        <p>
            @if ($errors->any()) 
                <div class="alert alert-danger" style="margin: 0 50px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-left" style="margin-left: 10px; list-style: none;">- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </p>

        <p class="login-input">
            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
        </p>
        <p class="login-input">
            <input type="password" placeholder="Password" name="password">
        </p>

        <p class="text-left" style="margin-left: 50px;">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </p>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p class="login-button">
            <button type="submit" class="submit" name="submit">Login</button>
        </p>
        <p class="span">or</p>
        <p class="login-button">
            <button type="button" class="facebook" name="facebook">Facebook</button>
        </p>
        <p class="span">or</p>
        <p class="login-button">
            <button type="button" class="google" name="google+">Google +</button>
        </p>

        <p><a href="{{ route('password.request') }}">Forget password?</a> | <a href="{{ route('register') }}">Create account</a></p>
    </form>  
@endsection