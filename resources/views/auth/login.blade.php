@extends('layouts.app')

@section('content')
<div class="form-con">
    <div class="container">
    <div class="row">
        <div class="col s12 xl8 push-xl2">
            <div class="card-panel">
                <h4>Login</h4>
                    <form method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="input-field col s12">
                        <input type="email" name="email" placeholder="{{__('Email')}}" value="{{old('email')}}">
                        @error('email')
                            <span class="helper-text red-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field col s12">
                        <input type="password" name="password" placeholder="{{__('Password')}}">
                        @error('password')
                            <span class="helper-text red-text">{{$message}}</span>
                        @enderror
                    </div>
                    <p>
                        <label>
                            <input type="checkbox" class="filled-in checkbox-blue" name="remember" {{old('remember') ? 'checked' : ''}}/>
                            <span>{{__('Remember Me')}}</span>
                        </label>
                    </p>
                    <div class="input-field">
                        <button type="submit" name="submit" class="blue btn darken-1">{{__('Login')}}</button>
                        <a href="{{route('password.request')}}" class="brown-text">Forgot Your Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
