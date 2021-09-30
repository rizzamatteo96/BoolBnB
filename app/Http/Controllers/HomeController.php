<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $username = null;

        if(Auth::user()->name){

            $username = Auth::user()->name;

        } else{

            $username = strstr(Auth::user()->email, '@', true);

        }

            $username = ucfirst($username);

        return view('home', compact('username') );
        
    }
}
