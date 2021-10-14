<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\Response;

use App\User;

class UserController extends Controller
{

    public function email()
    {
        $user = Auth::all();

        return response()->json([
            'email' => $user
        ]);
    }

}
