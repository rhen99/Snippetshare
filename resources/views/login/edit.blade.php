@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Update Snippet</h3>
    </div>
    <div class="row">
        <div class="col s12">
            <form method="POST" action="/update-snippet/{{$snippet->id}}">
                @csrf
                @method('put')
                <div class="input-field">
                    <textarea name="caption" class="materialize-textarea white" placeholder="Describe Your Post...">{{$snippet->caption}}</textarea>
                </div>
                <div class="input-field">
                    <textarea name="code" class="materialize-textarea white" placeholder="Paste The Snippet Here...">{{$snippet->code}}</textarea>
                </div>
                <div class="input-field">
                    <input type="submit" class="btn btn-large blue" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection