@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Update Info</h3>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="display_photo">
                <img id="preview" src="/storage/display_photos/{{$user->display_photo}}">
            </div>
            <form method="POST" action="/update-info" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="input-field">
                    <input type="text" name="name" placeholder="First Name" value="{{$user->name}}">
                    @error('name')
                        <span class="helper-text red-text">{{$message}}</span>
                    @enderror
                </div>
                <div class="file-field input-field">
                    <div class="btn blue">
                        <span>File</span>
                            <input type="file" accept="image/" id="profile" name="display_photo">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                    @error('display_photo')
                        <span class="helper-text red-text">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <input type="submit" class="btn btn-large blue" value="Save Changes">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection