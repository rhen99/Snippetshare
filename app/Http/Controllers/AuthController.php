<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Snippet;

class AuthController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $snippets = Snippet::orderBy('created_at', 'desc')->get();
        
        return view('login.index')->with([
            'snippets' => $snippets,
            'user' => auth()->user()
        ]);
    }
}
