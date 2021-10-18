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

            // create arrays for each month
            $january = [];
            $february = [];
            $march = [];
            $april = [];
            $may = [];
            $june = [];
            $july = [];
            $august = [];
            $september = [];
            $october = [];
            $november = [];
            $december = [];

            foreach($statistics as $statistic){
                $click = substr($statistic->clicked_at, 5, 2);
                // dd($click);
                switch($click){
                    case '01': 
                        array_push($january, $statistic);
                        break;
                    case '02': 
                        array_push($february, $statistic);
                        break;
                    case '03': 
                        array_push($march, $statistic);
                        break;
                    case '04': 
                        array_push($april, $statistic);
                        break;
                    case '05': 
                        array_push($may, $statistic);
                        break;
                    case '06': 
                        array_push($june, $statistic);
                        break;
                    case '07': 
                        array_push($july, $statistic);
                        break;
                    case '08': 
                        array_push($august, $statistic);
                        break;
                    case '09': 
                        array_push($september, $statistic);
                        break;
                    case '10': 
                        array_push($october, $statistic);
                        break;
                    case '11': 
                        array_push($november, $statistic);
                        break;
                    case '12': 
                        array_push($december, $statistic);
                        break;
                }
            }
            
            $maxClick = max($january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december);

            return view('userreg.statistics.show', compact('statistics', 'apartment', 'january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december', 'maxClick'));
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
