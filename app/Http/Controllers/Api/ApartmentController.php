<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

use App\Apartment;
use App\Service;

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

        // change '-' with '.' because it is not possible to transfer '.'
        $apiQuery = str_replace("_", ".", $slug);
        
        // take the filters from the other page and divide them to single var
        list($beds, $rooms, $distance) = explode(";", $filters);

        $beds = intval(substr($beds, strpos($beds, "=") + 1));  
        $rooms = intval(substr($rooms, strpos($rooms, "=") + 1));  
        $distance = intval(substr($distance, strpos($distance, "=") + 1)); 


        // prepare apiUrl to call it
        $apiUrl = 'https://api.tomtom.com/search/2/reverseGeocode/' . $apiQuery . '.JSON?key=K3xnfxcXAODvZopP0scVRnmjNxjruLUo';
    
        // call TomTom api
        $response = Http::get($apiUrl);

        // take TomTom response
        $positionCity = $response->json()['addresses'][0]['address']['localName'];




        // richiamo il post presente nel DB che riporta positionCity richiesto
        $apartments = Apartment::where('city', $positionCity)
                                ->where('visibility', 1)
                                ->where('n_rooms', '>=', $rooms)
                                ->where('n_beds', '>=', $beds)
                                ->with(['services'])->get();

        // controllo se c'è l'immagine salvata e preparo il path per la visualizzazione in front end
        foreach($apartments as $apartment){

            // formula to find if th epoint is inside the radius (x-center_x)^2 + (y - center_y)^2 < radius^2
            if($apartment->img){
                $apartment->img = url('storage/' . $apartment->img); 
            }

            // if((pow($apartment->longitude - $center_longitude, 2) + pow($apartment->latitude - $center_latitude, 2)) < pow($radius, 2)){

            // }

        }

        // restituisco un JSON visibile anche alla route che si trova in api.php
        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);
    }

    public function services()
    {
        $services = Service::all();

        // restituisco un JSON visibile anche alla route che si trova in api.php
        return response()->json([
            'success' => true,
            'results' => $services
        ]);
    }
}
