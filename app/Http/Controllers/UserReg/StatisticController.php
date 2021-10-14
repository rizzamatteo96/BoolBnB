<?php

namespace App\Http\Controllers\UserReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Statistic;
use App\Apartment;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrive apartment list of the logged  user
        $user = Auth::user()->id;
        $data = Apartment::where('user_id', $user)->get();
        // dd($data);
        
        return view('userreg.statistics.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // load apartment id and user id
        $apartment = Apartment::where('id', $id)->first();
        $user = Auth::user()->id;

        // check if the apartment is one of the logged user otherwise go to 404 page
        if($apartment && $apartment->user_id == $user){
            $statistics = Statistic::where('apartment_id', $id)->get();
            // dd($statistics);
            return view('userreg.statistics.show', compact('statistics', 'apartment'));
        } else {
            abort(403);
        }
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
    }
}
