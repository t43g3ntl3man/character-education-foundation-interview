@extends('layouts.auth-master')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <form method="post" action="/register" style="text-align: center; width: 25%">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1 class="h3 mb-3 fw-normal">Register</h1>

            <div class="form-group form-floating mb-3">
                <input type="email" class="form-control" style="width: 100%" name="email" value="{{ old('email') }}"
                    placeholder="name@example.com" required="required" autofocus>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control" style="width: 100%" name="name" value="{{ old('name') }}"
                    placeholder="Nash Korn" required="required" autofocus>
                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" style="width: 100%" name="password"
                    value="{{ old('password') }}" placeholder="Password" required="required">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control" style="width: 100%" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                @if ($errors->has('password_confirmation'))
                    <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" style="margin-top: 5px ; width: 50%"
                type="submit">Register</button>
            <a href="{{ route('login') }}" class="w-100 btn btn-lg btn-primary"
                style="margin-top: 5px ; width: 25%; margin-top: 5px">
                Login
            </a>

        </form>
    </div>
@endsection
