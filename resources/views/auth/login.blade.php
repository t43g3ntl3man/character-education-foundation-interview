@extends('layouts.auth-master')

@section('content')
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <form method="post" action="{{ route('login.perform') }} " style="text-align: center; width: 25%">

            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            @include('layouts.partials.messages')

            <div class="form-group form-floating mb-3">
                <input type="text" class="form-control w-50" name="username" value="{{ old('username') }}"
                    placeholder="Email" required="required" style="width: 100%" autofocus>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group form-floating mb-3">
                <input type="password" class="form-control w-50" name="password" value="{{ old('password') }}"
                    placeholder="Password" required="required" style="width: 100%">
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <button class="w-100 btn btn-lg btn-primary" style="width: 25%; margin-top: 5px" type="submit">Login</button>
            <a href="{{ route('register.show') }}" class="w-100 btn btn-lg btn-primary" style="width: 25%; margin-top: 5px">
                Register
            </a>
        </form>
    </div>
@endsection
