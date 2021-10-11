<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::where('visibility', 1)->get();
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // richiamo il post presente nel DB che riporta lo slug richiesto
        $apartment = Apartment::where('slug', $slug)->with(['services'])->first();

        // controllo se c'è l'immagine salvata e prepare il path per la visualizzazione in front end
        if($apartment->img){
            $apartment->img = url('storage/' . $apartment->img); 
        }

        // restituisco un JSON visibile anche alla route che si trova in api.php
        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($slug, $filters)
    {
        // take the filters from the other page and divide them to single var
        list($beds, $rooms, $distance) = explode(";", $filters);

        $beds = substr($beds, strpos($beds, "=") + 1);  
        $rooms = substr($rooms, strpos($rooms, "=") + 1);  
        $distance = substr($distance, strpos($distance, "=") + 1);  


        // richiamo il post presente nel DB che riporta lo slug richiesto
        $apartments = Apartment::where('city', $slug)->where('visibility', 1)->with(['services'])->get();

        // controllo se c'è l'immagine salvata e preparo il path per la visualizzazione in front end
        foreach($apartments as $apartment){

            // formula to find if th epoint is inside the radius (x-center_x)^2 + (y - center_y)^2 < radius^2
            if($beds && $rooms && $distance){
                if($apartment->img){
                    $apartment->img = url('storage/' . $apartment->img); 
                }
            } else {
                return response()->json([
                    'success' => false
                ]);
            }




            // if((pow($apartment->longitude - $center_longitude, 2) + pow($apartment->latitude - $center_latitude, 2)) < pow($radius, 2)){     }

        }

        // restituisco un JSON visibile anche alla route che si trova in api.php
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }
}
