<?php

namespace App\Http\Controllers\UserReg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        // Retrive apartment list of the logged  user
        $user = Auth::user()->id;
        $data = Apartment::where('user_id', $user)->get();
        // dd($data);
        
        return view('userreg.apartments.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view('userreg.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create validation request
        $request->validate([
            // Apartment details
            'title' => 'required|max:255',
            'description' => 'required',
            'n_rooms' => 'required|min:1|numeric',
            'n_beds' => 'required|min:1|numeric',
            'n_bathrooms' => 'required|min:1|numeric',
            'n_square_meters' => 'required|min:1|numeric',
            'daily_price' => 'nullable|min:1|numeric',
            'image' => 'required|image',
            
            // Address section
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'house_num' => 'required|max:20',
            'postal_code' => 'required|max:10'
        ]);

        // recupero i dati dal form
        $newApartment = $request->all();

        // imposto lo slug dal titolo verificando che non sia già presente nella tabella essendo questo univoco
        $baseSlug = Str::slug($newApartment['title'], '-');

        $newSlug = $baseSlug;
        $counter = 0;
        while(Apartment::where('slug', $newSlug)->first()){
            $counter++;
            $newSlug = $baseSlug . '-' . $counter;
        }

        $newApartment['slug'] = $newSlug;
        
        // creo la nuova istanza per inviare i dati al DB
        $upApartment = new Apartment();

        if(array_key_exists('image', $newApartment)){
            // salvo l'immagine e ne recupero il percorso
            $img_path = Storage::put('covers', $newApartment['image']);
            // salvo il tutto nella tabella apartments
            $newApartment['image'] = $img_path;
        }



        // forzo lat e long per test
        $newApartment['latitude'] = 45.7737690000;
        $newApartment['longitude'] = 11.45460100000;

        // seleziono l'utente loggato
        $newApartment['user_id'] = Auth::user()->id;;

        // Invio i dati e li salvo nel DB
        $upApartment->fill($newApartment);
        $upApartment->save();

        $upApartment->services()->attach($request->services);

        return redirect()->route('userreg.apartments.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('userreg.apartments.show', compact('apartment'));
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