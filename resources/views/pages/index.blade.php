@extends('layouts.app')
@section('content')
<div class="showcase">
    <div class="showcase-inner">
        <h2 class="white-text">Share Your Code Snippets</h2>
        <p class="white-text flow-text">Connect With Other Programmers</p>
        <a href="{{route('login')}}" class="btn btn-large brown darken-1">Login</a>
        <a href="{{route('register')}}" class="btn btn-large blue darken-1">Register</a>
    </div>
</div>
@endsection