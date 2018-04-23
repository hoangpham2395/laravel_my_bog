@extends('layouts.app')

@section('title')
    Reset Password
@endsection

@section('content')
    <form class="form-horizontal" action="{{ route('password.request') }}" method="post">
        <p class="title">Reset Password</p>

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
            <input id="email" type="email" placeholder="Email" name="email" value="{{ $email or old('email') }}" required autofocus>
        </p>
       
        <p class="login-input">
            <input id="password" type="password" placeholder="Password" name="password">
        </p>
        <p class="login-input">
            <input id="password-confirm" type="password" placeholder="Confirm password" name="password_confirmation">
        </p>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p class="login-button">
            <button type="submit" class="submit" name="submit">Reset Password</button>
        </p>

        <p><a href="{{ route('login') }}">Login</a> 
    </form>  
@endsection