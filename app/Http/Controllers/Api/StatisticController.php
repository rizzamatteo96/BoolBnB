<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Statistic;

class StatisticController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        
        $validator = Validator::make($request->all(),[
            'apartment_id' => 'required',
            'clicked_at' => 'required|date',
            'visitor' => 'required'
        ]);
        
        if($validator->fails()){
            return response()->json([
                'success' => $data,
                'errors' => $validator->errors()
            ]);
        }
        
        // $new_statistic = new Statistic();
        // $new_statistic->fill($data);
        // $new_statistic->save();

        $newStat = new Statistic();
        $newStat->fill($data);
        $newStat->save();
    }
}
