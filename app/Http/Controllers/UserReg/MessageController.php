<?php

namespace App\Http\Controllers\UserReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $apartments = Apartment::where('user_id', $user)->get();

        // $apartments_id_array = [];

        // foreach($apartments as $apartment){
        //     array_push($apartments_id_array, $apartment->id);
        // }

        foreach($apartments as $apartment){
            $messages[] = Message::where('apartment_id', $apartment->id)->get();
        }

        $messages_list = [];

        foreach($messages as $message){
            array_push($messages_list, $message->toArray());
        }
        // dd($messages_list);

        // dd($apartments_id_array);

        return view('userreg.messages.index', compact('messages_list', 'apartments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = Auth::user()->id;
        // load message with ID 
        $message = Message::where('id', $id)->first();
        // load apartment
        $apartment = Apartment::where('id', $message['apartment_id'])->first();

        // check if the apartment is one of the logged user otherwise go to 404 page
        if($apartment && $apartment->user_id == $user){
            return view('userreg.messages.show', compact('message', 'apartment'));
        } else{
            abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('userreg.messages.index');
    }
}
