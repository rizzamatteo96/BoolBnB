<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($request->all(),[
            'apartment_id' => 'required',
            'email' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => $data,
                'errors' => $validator->errors()
            ]);
        }

        $new_message = new Message();
        $new_message->fill($data);

        $new_message->save();

    }
}
