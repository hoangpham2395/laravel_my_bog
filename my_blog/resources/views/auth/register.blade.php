@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
        <p class="title">Register</p>

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
            <input type="text" placeholder="Username" name="name" value="{{ old('name') }}">
        </p>
        <p class="login-input">
            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
        </p>
        <p class="login-input">
            <input type="password" placeholder="Password" name="password">
        </p>
        <p class="login-input">
            <input type="password" placeholder="Confirm password" name="confirm_password">
        </p>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p class="login-button">
            <button type="submit" class="submit" name="submit">Register</button>
        </p>

        <p><a href="{{ route('login') }}">Login</a> 
    </form> 
@endsection