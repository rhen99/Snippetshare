@extends('layouts.app')
@section('content')
    <div class="main">
        <div class="container">
        <div class="row">
            <div class="col s12 xl8 push-xl2">
                @if (count($snippets))
                    @foreach ($snippets as $snippet)
                        @php
                            $liked = $user->likes()->where('snippet_id', $snippet->id)->first();
                        @endphp
                        <div class="card-panel" data-postid="{{$snippet->id}}">
                            <div class="user">
                                <div class="user-details">
                                    <div class="avatar">
                                        <img src="/storage/display_photos/{{$snippet->user->display_photo}}" alt="">
                                    </div>
                                    <div class="user-name">
                                        <a href="#">{{$snippet->user->name}}</a>
                                    </div>
                                </div>
                                <div class="post-details">
                                    <span class="badge {{$snippet->badge}} white-text">{{$snippet->type}}</span>
                                </div>
                            </div>
                            <div class="caption">
                                {{$snippet->caption}}
                            </div>
                            <div class="code-snippet">
                                <pre>
                                    <code class="{{$snippet->class}}">
{{$snippet->code}}
                                    </code>
                                </pre>
                            </div>
                            <div class="actions">
                                <a href="#" class="like btn {{$liked ? 'red': 'blue'}}"><i class="material-icons">{{$liked ? 'thumb_down' : 'thumb_up'}}</i></a>
                                <span class="likes">{{count($snippet->likes)}} </span>
                                <span>{{count($snippet->likes) < 1 ? '': count($snippet->likes) > 1 ? 'likes': 'like'}}</span>
                            </div>
                            <div class="comment-section">
                                <form data-postid="{{$snippet->id}}">
                                    <div class="input-field">
                                        <textarea id="comment_body" class="materialize-textarea" placeholder="Comment Here..."></textarea>
                                    </div>
                                    <div class="input-field">
                                        <input type="submit" id="submitComment" class="btn btn-large blue" value="Comment">
                                    </div>
                                </form>
                                <div class="comments" id="comments">
                                    @if (count($snippet->comments))

                                        @foreach ($snippet->comments->sortByDesc('created_at') as $comment)
                                            <div class="comment">
                                                <div class="user">
                                                    <div class="user-details">
                                                        <div class="avatar">
                                                            <img src="/storage/display_photos/{{$comment->user->display_photo}}" alt="">
                                                        </div>
                                                        <div class="user-name">
                                                            <a href="#">{{$comment->name}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="comment_body">
                                                    {{$comment->body}}
                                                </div>
                                                <div class="comment_action">
                                                    <a class="btn blue" href="{{route('manageComments')}}"><i class="material-icons">settings</i></a>
                                                </div>
                                                <hr>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
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
    </div>
    <script>
        const token = '{{Session::token()}}';
        const commentUrl = '{{route("comment")}}';
        const manageCommentsUrl = '{{route("manageComments")}}';
        const likeUrl = '{{route("like")}}';
        const userName = '{{Auth::user()->name}}';
        const userImg = '/storage/display_photos/{{Auth::user()->display_photo}}';
    </script>
@endsection
