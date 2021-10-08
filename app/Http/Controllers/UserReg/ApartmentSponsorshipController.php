<?php

namespace App\Http\Controllers\UserReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Apartment;
use App\Sponsorship;

class ApartmentSponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $user = Auth::user()->id;

        $id = $request->all()['id'];

        $apartment = Apartment::where('id', $id)->first();
        // dd($apartment);
        $sponsorships = Sponsorship::all();
        return view('userreg.apartment-sponsorship.index', compact( 'apartment', 'sponsorships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $user = Auth::user()->id;
        $sponsorshipId = $request->all()['sponsorship-id'];
        $apartmentId = $request->all()['apartment-id'];

        $apartment = Apartment::where('id', $apartmentId)->first();
        // dd($apartment);
        $sponsorship = Sponsorship::where('id', $sponsorshipId)->first();

        return view('userreg.apartment-sponsorship.create', compact( 'apartment', 'sponsorship'));
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
        //
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
