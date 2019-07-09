<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with('user', auth()->user());
    }
    public function edit_user(){
        return view('edit')->with('user', auth()->user());
    }
    public function update_user(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'display_photo' => 'image|max:1999'
        ]);
        if($request->hasFile('display_photo')){
            $filenameWithExt = $request->file('display_photo')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('display_photo')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time().'.'.$extension;
            
            $path = $request->file('display_photo')->storeAs('public/display_photos', $filenameToStore);


            
        }
        $user = User::findOrFail(auth()->user()->id);
            $user->name = $request->name;
            if($request->hasFile('display_photo')){
                $user->display_photo = $filenameToStore;
            }
            $user->update();

            return redirect('/dashboard');
    }
}
