<?php

namespace App\Http\Controllers\UserReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        /*
        Create a user name to show it on when it is logged
        In case of name use that, in case it is not present, use the email part before @
        */
        // if(Auth::user()->name){
        //     $username = Auth::user()->name;
        // } else{
        //     $username = strstr(Auth::user()->email, '@', true);
        // }
        // $username = ucfirst($username);

        // return view('userreg.home', compact('username'));
        return view('userreg.home');
    }
}
