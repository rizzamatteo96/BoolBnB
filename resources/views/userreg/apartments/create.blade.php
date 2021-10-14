@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')
   
    <form action="{{route('userreg.apartments.store')}}" method="POST" name="createApartment" enctype="multipart/form-data">
        {{-- generate token --}}
        @csrf
        
        {{-- Start - Input title field & visibility switch --}}
        <div class="row mb-3 align-items-center">
            {{-- start - Input title field --}}
            <div class="col-6">
                <label for="apartmenttitle" class="form-labe h4">Titolo *</label>
                <input id="apartmenttitle" type="text" class="form-control @error('title')is-invalid @enderror" required onfocusout="verifyTitle(apartmenttitle)" name="title" value="{{old('title')}}" required>

                {{-- Add error write --}}
                <span id="valTitle" class="text-danger"></span>

                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Input title field --}}

            {{-- Start - visibility switch --}}
            <div class="col-6">
                <div class="custom-control custom-switch">
                    {{-- @dd(old('visibility')) --}}
                    <input name="visibility" type="checkbox" class="custom-control-input" id="customSwitch1" 
                    @if(old('visibility') == 'on')
                        checked
                    @endif>
                    <label class="custom-control-label" for="customSwitch1">Visibilità</label>
                    <span class="text-muted">(se non selezionato, l'appartamento non sarà visibile. Potrai modificare questo campo in seguito)</span>
                </div>
            </div>
            {{-- End - visibility switch --}}
        </div>
        {{-- End - Input title field & visibility switch --}}

        <div class="mt-5">
            <hr>
        </div>

        {{-- Sezione immagine --}}
        <div class="row">

            <div class="col-12">
                <label for="image" class="form-label h4 mb-4">Immagine copertina *</label>
            </div>

            <div class="col-4">
                {{-- Inizio - Campo caricamento foto --}}
                <div class="mb-3">
                    <input type="file" required accept="image/*" onchange="displayImg(event)" name="image" id="image" class="form-control-file mb-2
                    @error('image') 
                        is-invalid 
                    @enderror">
                </div>

            </div>

            <div class="col-6">
                {{-- Visualizza immagine in DB --}}
                <img id="output" class="w-75" src="{{asset("img/empty-image-white.jpg")}}">  
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- end img section --}}

        <div class="mt-5">
            <hr>
        </div>

        {{-- Inizio - Campo inserimento descrizione --}}
        <div class="mb-3">
            <div class="h4">Informazioni *</div>

            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control
            @error('description') 
                is-invalid 
            @enderror" 
            id="description" name="description" rows="5" onfocusout="verifyDescripton(description)" required> {{old('description')}}</textarea>
            
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
                id="n_rooms" name="n_rooms" value="{{old('n_rooms')}}" required onfocusout="verifyRooms(n_rooms)">

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
                id="n_beds" name="n_beds" value="{{old('n_beds')}}" required onfocusout="verifyBeds(n_beds)">

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
                <input type="number" min="1" class="form-control
                @error('n_bathrooms') 
                    is-invalid 
                @enderror" 
                id="n_bathrooms" name="n_bathrooms" value="{{old('n_bathrooms')}}" required onfocusout="verifyBathrooms(n_bathrooms)">

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
                <input type="number" min="1" class="form-control
                @error('n_square_meters') 
                    is-invalid 
                @enderror" 
                id="n_square_meters" name="n_square_meters" value="{{old('n_square_meters')}}" required onfocusout="verifySquareMeters(n_square_meters)">

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

         {{-- Inizio - Campo inserimento del Indirizzo --}}
         <div class="row mb-3">

            {{-- Input address field with autocomplete from tomtom --}}
            <div id="search-field" class="col-12"></div>

            {{-- Start - error messages container from validator --}}
            <div class="col-12">
                <div>
                    @error('city')
                        <div class="alert alert-danger pt-1">{{ $message }}</div>
                    @enderror
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('house_num')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('postal_code')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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

                    {{-- <div class="ms_input-checkbox"></div> --}}
                    <input type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}"
                    @if (in_array($service->id, old('services',[])))
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

        {{-- start btn pop-up (go-back to index.apartment) --}}
        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-arrow-left me-2" onclick="return confirm('Sei sicuro di voler cancellare l\'elemento?')"></i>
            Torna indietro
        </button>
        {{-- start btn pop-up (go-back to index.apartment) --}}

        {{-- start btn save data --}}
        <button type="submit" class="btn btn-primary">Salva</button>
        {{-- end btn save data --}}

        <div class="mb-0 form-group row">
            <span class="text-danger text-md-left col-md-9 col-form-label">I campi contrassegnati con * sono obbligatori</span>
        </div>

    </form>
   
    {{-- Pop-up (go back to apartmnet.index or stay in create) --}}
    <form method="get" action="{{route('userreg.apartments.index')}}">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Torna indietro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler tornare indietro? Tutte le modifiche effettuate andranno perse.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Continua l'inserimento dati</button>
                <button type="submit" class="btn btn-secondary">Torna indietro</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    {{-- end Pop-up (go back to apartmnet.index or stay in create) --}}

@endsection