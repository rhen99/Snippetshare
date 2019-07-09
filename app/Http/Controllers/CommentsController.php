<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Snippet;
use App\User;

class CommentsController extends Controller
{
    
public function __construct(){
        $this->middleware('auth');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $postId = $request['postId'];
        $body = $request['commentBody'];
        $snippet = Snippet::findOrFail($postId);
        $user = User::findOrFail(auth()->user()->id);
        if($snippet){
            $comment = new Comment;
            $comment->body = $body;
            $comment->name = auth()->user()->name;
            $comment->user()->associate($user);
            $comment->snippet()->associate($snippet);
            $comment->save();
        }else{
            return null;
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'body' => 'required'
        ]);
        $comment = Comment::findOrFail($id);
        $comment->body = $request->body;
        $comment->update();

        return redirect('/manage-comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        if(auth()->user()->id !== $comment->user_id){
            return redirect('/dashboard');
        }else{
           $comment->delete();
           return redirect('/manage-comments');
        }
    }
    public function manage(){
        $user_comments = auth()->user()->comments->sortByDesc('created_at');
        return view('login.comments.manage')->with('comments', $user_comments);
    }
}
