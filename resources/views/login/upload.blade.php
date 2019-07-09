@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Upload Snippet</h3>
    </div>
    <div class="row">
        <div class="col s12">
            <form method="POST" action="/store">
                @csrf
                
                <div class="input-field">
                    <textarea name="caption" class="materialize-textarea white" placeholder="Describe Your Post..."></textarea>
                </div>
                <div class="input-field">
                    <textarea name="code" class="materialize-textarea white" placeholder="Paste The Snippet Here..."></textarea>
                </div>
                <div class="imput-field">
                    @include('includes.type')
                </div>
                <div class="input-field">
                    <input type="submit" class="btn btn-large blue" value="Upload Snippet">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection