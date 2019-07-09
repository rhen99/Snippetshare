@extends('layouts.app')

@section('content')
<div class="form-con">
    <div class="container">
    <div class="row">
        <div class="col s12 xl8 push-xl2">
            <div class="card-panel">
                <h4>New Password</h4>
                    <form method="POST" action="{{route('password.update')}}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="input-field">
                        <input type="email" name="email" placeholder="{{__('Email')}}" value="{{$email ?? old('email')}}" required>
                        @error('email')
                            <span class="helper-text red-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="{{__('New Password')}}" required>
                        @error('password')
                            <span class="helper-text red-text">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-field">
                        <input type="password" name="password_confirmation" required placeholder="{{__('Confirm Password')}}">
                        
                    </div>
                    
                    <div class="input-field">
                        <button type="submit" name="submit" class="brown btn darken-1">{{__('Reset Password')}}</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
