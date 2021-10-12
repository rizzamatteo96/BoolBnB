<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

use Illuminate\Support\Facades\DB;
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

    public function getDistanceFromLatLonInKm($lat1, $lon1, $lat2, $lon2) {
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2 - $lat1);  // deg2rad below
        $dLon = deg2rad($lon2 - $lon1); 
        $a = 
            sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
            sin($dLon / 2) * sin($dLon / 2); 
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
        $d = $R * $c; // Distance in km
        return $d;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($slug, $filters)
    {
        // function to get the distances between two point on the earth surface
        function getDistanceFromLatLonInKm($lat1, $lon1, $lat2, $lon2) {
            $R = 6371; // Radius of the earth in km
            $dLat = deg2rad($lat2 - $lat1);  // deg2rad below
            $dLon = deg2rad($lon2 - $lon1); 
            $a = 
                sin($dLat / 2) * sin($dLat / 2) +
                cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
                sin($dLon / 2) * sin($dLon / 2); 
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a)); 
            $d = $R * $c; // Distance in km
            return $d;
        }


        // change '-' with '.' because it is not possible to transfer '.'
        $apiQuery = str_replace("_", ".", $slug);

        list($lat, $lon) = explode(",", $apiQuery);
        

        // take the filters from the other page and divide them to single var
        list($beds, $rooms, $distance) = explode(";", $filters);

        $beds = intval(substr($beds, strpos($beds, "=") + 1));  
        $rooms = intval(substr($rooms, strpos($rooms, "=") + 1));  
        $distanceUser = intval(substr($distance, strpos($distance, "=") + 1)); 


        // // prepare apiUrl to call it
        // $apiUrl = 'https://api.tomtom.com/search/2/reverseGeocode/' . $apiQuery . '.JSON?key=K3xnfxcXAODvZopP0scVRnmjNxjruLUo';
    
        // // call TomTom api
        // $response = Http::get($apiUrl);

        // // take TomTom response
        // $positionCity = $response->json()['addresses'][0]['address']['localName'];

        $apartmentsDb = Apartment::where('visibility', 1)
                                ->where('n_rooms', '>=', $rooms)
                                ->where('n_beds', '>=', $beds)
                                ->with(['services'])->get();



        // check the distance between the point and the apartment
        foreach($apartmentsDb as $apartmentDb){

            $distancePoints = getDistanceFromLatLonInKm($lat, $lon, $apartmentDb->latitude, $apartmentDb->longitude);
            if($distancePoints <= $distanceUser){
                $apartments[] = $apartmentDb;
            }

        }

        // prepare the img for the single apartment
        if(isset($apartments)){
            foreach ($apartments as $apartment) {
                if($apartment->img){
                    $apartment->img = url('storage/' . $apartment->img); 
                }
            }
        } else {
            // return a JSON as response
            return response()->json([
                'success' => true,
                'results' => '',

            ]);
        }
        
        // return a JSON as response
        return response()->json([
            'success' => true,
            'results' => $apartments,

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
