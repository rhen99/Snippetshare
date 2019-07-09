@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h3>Profile</h3>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="/storage/display_photos/{{$user->display_photo}}" alt="">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <h3>{{$user->name}}</h3>
                        @if (count($user->snippets) > 0)
                            <p><strong>Current Snippets</strong>: {{count($user->snippets)}}</p>
                        @else
                            <p><strong>Current Snippets</strong>: None</p>
                        @endif
                    </div>
                    <div class="card-action">
                        <a href="/upload">Upload A New Snippet</a>
                        <a href="/edit-user">Edit User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h4>All Snippets</h4>
    </div>
    <div class="row">
        <div class="col s12">
            @if (count($user->snippets))
                @foreach ($user->snippets as $snippet)
                    <div class="card-panel">
                            <div class="caption">
                                {{$snippet->caption}}
                                <span class="badge {{$snippet->badge}} white-text">{{$snippet->type}}</span>
                            </div>
                            <div class="code-snippet">
                                <pre>
                                    <code class="{{$snippet->class}}">
{{$snippet->code}}
                                    </code>
                                </pre>
                            </div>
                            <h6>Total Likes: {{count($snippet->likes)}}</h6>
                            <div class="actions">
                                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-snippet').submit();" class="btn red"><i class="material-icons">delete</i></a>
                                <a href="/edit-snippet/{{$snippet->id}}" class="btn blue"><i class="material-icons">edit</i></a>
                            </div>
                            <form id="delete-snippet" action="/delete-snippet/{{$snippet->id}}" method="POST" style="display:none;">
                                @method('delete')
                                @csrf
                            </form>
                    </div>
                @endforeach
                @else
                    <div class="card-panel">
                        <p>You have no snippets, <a href="/upload">Upload One?</a></p>
                    </div>                
            @endif
        </div>
    </div>
</div>
@endsection
