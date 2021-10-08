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
            'services' => 'required',
            
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
        $newApartment['user_id'] = Auth::user()->id;

        // Invio i dati e li salvo nel DB
        $upApartment->fill($newApartment);
        $upApartment->save();

        // carico i servizi nella tabella ponte
        $upApartment->services()->attach($request->services);

        return redirect()->route('userreg.apartments.index');

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
            return view('userreg.apartments.show', compact('apartment'));
        } else {
            abort(404);
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
        $services = Service::all();

        // load apartment id and user id
        $apartment = Apartment::where('id', $id)->first();
        $user = Auth::user()->id;

        // check if the apartment is one of the logged user otherwise go to 404 page
        if($apartment && $apartment->user_id == $user){
            return view('userreg.apartments.edit', compact('apartment','services'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {
        // Creo le richieste di validazione
        $request->validate([
            // Apartment details
            'title' => 'required|max:255',
            'description' => 'required',
            'n_rooms' => 'required|min:1|numeric',
            'n_beds' => 'required|min:1|numeric',
            'n_bathrooms' => 'required|min:1|numeric',
            'n_square_meters' => 'required|min:1|numeric',
            'daily_price' => 'nullable|min:1|numeric',
            'image' => 'image',
            
            // Address section
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'house_num' => 'required|max:20',
            'postal_code' => 'required|max:10'
        ]);

        // recupero i dati dal form
        $editApartment = $request->all();

        // imposto lo slug dal titolo verificando che non sia già presente nella tabella essendo questo univoco
        $editSlug = Str::slug($editApartment['title'], '-');

        if($editSlug != $apartment->slug){

            $newEditSlug = $editSlug;
            $counter = 0;
            while(Apartment::where('slug', $newEditSlug)->first()){
                $counter++;
                $newEditSlug = $editSlug . '-' . $counter;
            }
            $editApartment['slug'] = $newEditSlug;
        }

        if(array_key_exists('image', $editApartment)){
            // Se esista già una foto, elimino la vecchia immagine prima di scrivere quella nuova
            if($apartment->image){
                Storage::delete($apartment->image);
            }
            // salvo l'immagine e ne recupero il percorso
            $image_path = Storage::put('covers', $editApartment['image']);
            // salvo il tutto nella tabella posts
            $editApartment['image'] = $image_path;
        }

        if(isset($editApartment['visibility'])){
            $editApartment['visibility'] = 1;
        } else{
            $editApartment['visibility'] = 0;
        };

        // forzo lat e long per test
        // $editApartment['latitude'] = 45.7737690000;
        // $editApartment['longitude'] = 11.45460100000;

        

        // carico le modifiche nel DB
        $apartment->update($editApartment);
        $apartment->services()->sync($request->services);

        return redirect()->route('userreg.apartments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        Storage::delete($apartment->image);
        $apartment->services()->detach();
        $apartment->delete();

        return redirect()->route('userreg.apartments.index');
    }

}
