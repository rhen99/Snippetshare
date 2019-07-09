@extends('layouts.app')

@section('content')
<div class="form-con">
    <div class="container">
        @if (session('status'))
            <div class="row">
                <div class="col s12 xl8 push-xl2">
                    <div class="card-panel green lighten-4 z-depth-0" role="alert">{{session('status')}}</div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col s12 xl8 push-xl2">
                <div class="card-panel">
                    <h4>Reset Password</h4>
                    <form method="POST" action="{{route('password.email')}}">
                        @csrf
                        <div class="input-field">
                            <input type="email" name="email" placeholder="{{__('Email')}}" value="{{old('email')}}">
                            @error('email')
                                <span class="helper-text red-text">{{$message}}</span>
                            @enderror
                        </div>
                    
                    <div class="input-field">
                        <button type="submit" name="submit" class="blue btn darken-1">{{__('Send Password Reset Link')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection