@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')
   
    <form action="{{route('userreg.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
        {{-- generate token --}}
        @csrf

        {{-- imposto il metodo per il form --}}
        @method('PUT')


        {{-- Sezione titolo & visibilità --}}
        <div class="row mb-3 align-items-end">
            {{-- Inizio - Campo inserimento del titolo --}}
            <div class="col-6">
                <label for="title" class="form-label h4">Titolo *</label>
                <input type="text" class="form-control
                @error('title') 
                    is-invalid 
                @enderror" required onfocusout="verifyTitle(apartmenttitle)" 
                id="apartmenttitle" name="title" value="{{old('title', $apartment->title)}}">

                {{-- Add error write --}}
                <span id="valTitle" class="text-danger"></span>

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Campo inserimento del titolo --}}


            {{-- Start - visibility switch --}}
            <div class="col-6">
                <div class="custom-control custom-switch">
                    {{-- @dd(old('visibility')) --}}
                    <input name="visibility" type="checkbox" class="custom-control-input" id="customSwitch1" 
                    @if (null == old('visibility') && $apartment->visibility)
                        checked
                    @elseif(old('visibility') == 'on')
                        checked
                    @endif>
                    <label class="custom-control-label" for="customSwitch1">Visibilità</label>
                    <span class="text-muted">(se non selezionato, l'appartamento non sarà visibile. Potrai modificare questo campo in seguito)</span>
                </div>
            </div>
            {{-- End - visibility switch --}}
        </div>
        {{-- Fine - Sezione titolo & visibilità --}}

        <div class="mt-5">
            <hr>
        </div>

        <label for="img" class="form-label h4 mb-4">Immagine copertina *</label>

        {{-- Sezione immagine --}}
        <div class="row ">
            <div class="col-4">
                {{-- Inizio - Campo caricamento foto --}}
                
                <div class="mb-3">
                    <input type="file" name="image" id="image" class="form-control-file
                    @error('image') 
                        is-invalid 
                    @enderror">

                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- Fine - Campo caricamento foto --}}
            </div>
            <div class="col-6">
                {{-- Visualizza immagine in DB --}}
                <img src="{{asset('storage/' . $apartment->image)}}" alt="{{$apartment->title}}" class="w-50">  
            </div>
        </div>        

        <div class="mt-5">
            <hr>
        </div>


        <div class="h4" >Informazioni *</div>



        {{-- Inizio - Campo inserimento descrizione --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control
            @error('description') 
                is-invalid 
            @enderror" 
            id="description" name="description" rows="5" onfocusout="verifyDescripton(description)" required> {{old('description', $apartment->description)}}</textarea>

            {{-- Add error write --}}
            <span id="valDescription" class="text-danger"></span>

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Fine - Campo inserimento descrizione --}}

        {{-- Start - Apartment details input fields --}}
        <div class="row mb-3">
            {{-- Start - number of rooms input field --}}
            <div class="col-3">
                <label for="n_rooms" class="form-label">Numero di stanze *</label>
                <input type="number" min="1" class="form-control
                @error('n_rooms') 
                    is-invalid 
                @enderror" 
                id="n_rooms" name="n_rooms" value="{{old('n_rooms', $apartment->n_rooms)}}"
                required onfocusout="verifyRooms(n_rooms)">

                {{-- Add error write --}}
                <span id="valRooms" class="text-danger"></span>

                @error('n_rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of rooms input field --}}

            {{-- Start - number of beds input field --}}
            <div class="col-3">
                <label for="n_beds" class="form-label">Numero di posti letto *</label>
                <input type="number" min="1" class="form-control
                @error('n_beds') 
                    is-invalid 
                @enderror" 
                id="n_beds" name="n_beds" value="{{old('n_beds', $apartment->n_beds)}}" required onfocusout="verifyBeds(n_beds)">

                {{-- Add error write --}}
                <span id="valBeds" class="text-danger"></span>

                @error('n_beds')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of beds input field --}}

            {{-- Start - number of bathrooms input field --}}
            <div class="col-3">
                <label for="n_bathrooms" class="form-label">Numero di bagni *</label>
                <input type="number" class="form-control
                @error('n_bathrooms') 
                    is-invalid 
                @enderror" 
                id="n_bathrooms" name="n_bathrooms" value="{{old('n_bathrooms', $apartment->n_bathrooms)}}" required onfocusout="verifyBathrooms(n_bathrooms)">

                {{-- Add error write --}}
                <span id="valBathrooms" class="text-danger"></span>

                @error('n_bathrooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of bathrooms input field --}}

            {{-- Start - square meters input field --}}
            <div class="col-3">
                <label for="n_square_meters" class="form-label">Metri quadri totali *</label>
                <input type="number" class="form-control
                @error('n_square_meters') 
                    is-invalid 
                @enderror" 
                id="n_square_meters" name="n_square_meters" value="{{old('n_square_meters', $apartment->n_square_meters)}}"  required onfocusout="verifySquareMeters(n_square_meters)">

                {{-- Add error write --}}
                <span id="valSquareMeters" class="text-danger"></span>

                @error('n_square_meters')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - square meters input field --}}
        </div>
        {{-- End - Apartment details input fields --}}

        <div class="mt-5">
            <hr>
        </div>

        {{-- Start - Show address saved in DB --}}
        <div class="row">
            <h6 class="col-12 h4">Indirizzo *</h6>
            <div class="col-12">
                Attuale :  {{$apartment->city . ', Via ' . $apartment->address . ' ' . $apartment->house_num . ' , ' . $apartment->postal_code}}
            </div>
        </div>
        {{-- End - Show address saved in DB --}}


        {{-- Inizio - Campo inserimento del Indirizzo --}}
        <div class="row mb-3">

            {{-- Input address field with autocomplete from tomtom --}}
            <div id="search-field" class="col-12"></div>

            {{-- Start - error messages container from validator --}}
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            {{-- End - error messages container from validator --}}

        </div>
        {{-- Fine - Campo inserimento del Indirizzo --}}

        <div class="mt-5">
            <hr>
        </div>

        {{-- Inizio - Campo di selezione dei services --}}
        <div class="mb-3">
            
            <h6 class="form-label h4">Servizi *</h6>
            
            @foreach ($services as $service)

                <div class="d-inline-block mr-2">
                    <input type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}"
                    @if(!$errors->any() && $apartment->services->contains($service->id))
                        checked
                    @elseif (in_array($service->id, old('services',[])))
                        checked
                    @endif>
                    <label for="{{$service->id}}">{{$service->name}}</label>
                </div>

            @endforeach

            @error('services')
            <span class="text-danger d-block">{{ $message }}</div>
            @enderror

        </div>
        {{-- Fine - Campo di selezione dei services --}}

        <div class="my-5">
            <hr>
        </div>

        <a href="{{route('userreg.apartments.index')}}" class="btn btn-outline-dark"><i class="fas fa-arrow-left mr-2"></i> Torna indietro</a>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection