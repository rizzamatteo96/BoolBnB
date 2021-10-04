@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')
   
    <form action="{{route('userreg.apartments.store')}}" method="POST" enctype="multipart/form-data">
        {{-- generate token --}}
        @csrf
        
        {{-- Inizio - Campo inserimento del titolo --}}
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control
            @error('title') 
                is-invalid 
            @enderror" 
            id="title" name="title" value="{{old('title')}}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Fine - Campo inserimento del titolo --}}

        {{-- Inizio - Campo caricamento foto --}}
        <div class="mb-3">
            <label for="img" class="form-label">Immagine copertina</label>
            <input type="file" name="image" id="img" class="form-control-file
            @error('image') 
                is-invalid 
            @enderror">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Fine - Campo caricamento foto --}}


        {{-- Inizio - Campo inserimento descrizione --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control
            @error('description') 
                is-invalid 
            @enderror" 
            id="description" name="description" rows="5"> {{old('description')}}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- Fine - Campo inserimento descrizione --}}

        {{-- Start - Apartment details input fields --}}
        <div class="row mb-3">
            {{-- Start - number of rooms input field --}}
            <div class="col-3">
                <label for="n_rooms" class="form-label">Numero di stanze</label>
                <input type="number" class="form-control
                @error('n_rooms') 
                    is-invalid 
                @enderror" 
                id="n_rooms" name="n_rooms" value="{{old('n_rooms')}}">
                @error('n_rooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of rooms input field --}}

            {{-- Start - number of beds input field --}}
            <div class="col-3">
                <label for="n_beds" class="form-label">Numero di posti letto</label>
                <input type="number" class="form-control
                @error('n_beds') 
                    is-invalid 
                @enderror" 
                id="n_beds" name="n_beds" value="{{old('n_beds')}}">
                @error('n_beds')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of beds input field --}}

            {{-- Start - number of bathrooms input field --}}
            <div class="col-3">
                <label for="n_bathrooms" class="form-label">Numero di posti letto</label>
                <input type="number" class="form-control
                @error('n_bathrooms') 
                    is-invalid 
                @enderror" 
                id="n_bathrooms" name="n_bathrooms" value="{{old('n_bathrooms')}}">
                @error('n_bathrooms')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - number of bathrooms input field --}}

            {{-- Start - square meters input field --}}
            <div class="col-3">
                <label for="n_square_meters" class="form-label">Metri quadri totali</label>
                <input type="number" class="form-control
                @error('n_square_meters') 
                    is-invalid 
                @enderror" 
                id="n_square_meters" name="n_square_meters" value="{{old('n_square_meters')}}">
                @error('n_square_meters')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- End - square meters input field --}}
        </div>
        {{-- End - Apartment details input fields --}}

        {{-- Inizio - Campo inserimento del Indirizzo --}}
        <div class="row mb-3">
            {{-- Inizio - Campo inserimento del Città --}}
            <div class="col-3">
                <label for="city" class="form-label">Città</label>
                <input type="text" class="form-control
                @error('city') 
                    is-invalid 
                @enderror" 
                id="city" name="city" value="{{old('city')}}">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Campo inserimento del Città --}}

            {{-- Inizio - Campo inserimento del Via --}}
            <div class="col-3">
                <label for="address" class="form-label">Via</label>
                <input type="text" class="form-control
                @error('address') 
                    is-invalid 
                @enderror" 
                id="address" name="address" value="{{old('address')}}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Campo inserimento del Via --}}

            {{-- Inizio - Campo inserimento del numero civico --}}
            <div class="col-3">
                <label for="house_num" class="form-label">Numero civico</label>
                <input type="text" class="form-control
                @error('house_num') 
                    is-invalid 
                @enderror" 
                id="house_num" name="house_num" value="{{old('house_num')}}">
                @error('house_num')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Campo inserimento del numero civico --}}

            {{-- Inizio - Campo inserimento del postal code --}}
            <div class="col-3">
                <label for="postal_code" class="form-label">CAP</label>
                <input type="text" class="form-control
                @error('postal_code') 
                    is-invalid 
                @enderror" 
                id="postal_code" name="postal_code" value="{{old('postal_code')}}">
                @error('postal_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- Fine - Campo inserimento del postal code --}}
            
        </div>
        {{-- Fine - Campo inserimento del Indirizzo --}}

        {{-- Inizio - Campo di selezione dei services --}}
        <div class="mb-3">
            @foreach ($services as $service)
                <span class="mx-1">
                <input type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}"
                @if (in_array($service->id, old('services',[])))
                    checked
                @endif>
                <label for="{{$service->id}}">{{$service->name}}</label>
                </span>
            @endforeach
        </div>
        {{-- Fine - Campo di selezione dei services --}}


        <a href="{{route('userreg.apartments.index')}}" class="btn btn-outline-dark"><i class="fas fa-arrow-left me-2"></i> Torna indietro</a>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
@endsection