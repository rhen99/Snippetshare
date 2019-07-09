<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snippet;

class SnippetsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('login.upload');
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
        $this->validate($request, [
            'code' => 'required',
            'type' => 'required'
        ]);
        $type = explode(" ", $request->input('type'));
        $snippet = new Snippet;
        $snippet->code = $request->input('code');
        $snippet->caption = $request->input('caption');
        $snippet->type = $type[0];
        $snippet->class = $type[1];
        $snippet->badge = $type[2].' '.$type[3];
        $snippet->user_id = auth()->user()->id;
        $snippet->save();

        return redirect('/dashboard');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $snippet = Snippet::findOrFail($id);
        if(auth()->user()->id !== $snippet->user_id){
            return redirect('/dashboard');
        }else{
            return view('login.edit')->with('snippet', $snippet);
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
            'code' => 'required',
        ]);
        $snippet = Snippet::findOrFail($id);
        $snippet->code = $request->input('code');
        $snippet->caption = $request->input('caption');
        $snippet->update();

        return redirect('/dashboard');
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
        $snippet = Snippet::findOrFail($id);
        if(auth()->user()->id !== $snippet->user_id){
            return redirect('/dashboard');
        }else{
           $snippet->delete();
           return redirect('/feed');
        }

    }
}
