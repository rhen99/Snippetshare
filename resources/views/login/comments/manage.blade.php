@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <h3>Manage Your Comments</h3>
            </div>
            <div class="row">
                <div class="col s12">
                    @if (count($comments) > 0)
                        <ul class="collection">
                            @foreach ($comments as $comment)
                                <li class="collection-item">
                                    <h6 class="comment-date">{{$comment->updated_at}}</h6>
                                    <p>{{$comment->body}}</p>
                                    <div class="actions">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('delete-comment').submit();" class="btn red"><i class="material-icons">delete</i></a>
                                        
                                        <a href="#modal1" id="updateComment" class="btn blue modal-trigger"><i class="material-icons" >edit</i></a>
                                    </div>
                                    <form id="delete-comment" action='/delete-comment/{{$comment->id}}', method="POST" style="display:none;">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4>Edit Comment</h4>
                                <form action="/update-comment/{{$comment->id}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="input-field">
                                        <textarea id="updatedBody" name="body" class="materialize-textarea"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn blue waves-effect modal-close" >Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                        @else
                        <div class="card-panel">
                            You have no comments.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
