<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snippet;
use App\Like;
use App\User;

class LikesController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function like(Request $request){
        $isLike = $request['isLike'];
        $postId = $request['postId'];
        $snippet = Snippet::findOrFail($postId);

        if($snippet){
            $user = auth()->user();
            $like = $user->likes()->where('snippet_id', $snippet->id)->first();
            if($like){
                $like->delete();
                return null;
            }else{
                $like = new Like;
                $like->user()->associate(User::findOrFail(auth()->user()->id));
                $like->snippet()->associate($snippet);
                $like->like = $isLike;
                $like->save();
            }
        }else{
            return null;
        }

    }
}
