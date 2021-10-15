<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Response;

class UserController extends Controller
{

    // public function email($id)
    // {
    //     $data = User::where('id', $id);

    //     $user = $data->email;

    //     return response()->json([
    //         'email' => $user
    //     ]);
    // }

    public function user(){
        
        $user = Auth::user();

        return response()->json([
            'user' => $user
        ]);
    }

}
