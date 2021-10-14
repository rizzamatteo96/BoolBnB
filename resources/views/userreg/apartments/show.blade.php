@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')

<div class="row mt-5">
        <div class="col-6">
            {{-- Apartment title and description --}}
            <h2>{{$apartment->title}}</h2>
            <div>
                {{$apartment->description}}
            </div>
        </div>

        <div class="col-6">
            {{-- Apartment image --}}
            <img class="img-thumbnail" src="{{asset('storage/' . $apartment->image)}}" alt="{{$apartment->title}}">
        </div>
    </div>

    {{-- Apartment details --}}
    <div class="row mt-5">
        <h3>Dettagli appartamento</h3>
        <div class="col-12 border border-dark rounded me-2 p-2">
            <div class="mt-1">Numero di stanze: {{$apartment->n_rooms}}</div>
            <div class="mt-1">Numero di letti: {{$apartment->n_beds}}</div>
            <div class="mt-1">Numero di bagni: {{$apartment->n_bathrooms}}</div>
            <div class="mt-1">Numero di metri quadri: {{$apartment->n_square_meters}}</div>
        </div>    
    </div>

    {{-- Apartment address --}}
    <div class="row mt-5">
        <h3>Indirizzo appartamento</h3>
        <div class="col-12 border border-dark rounded me-2 p-2">
            <div class="mt-1">Città: {{$apartment->city}}</div>
            <div class="mt-1">Via: {{$apartment->address}}</div>
            <div class="mt-1">Numero civico: {{$apartment->house_num}}</div>
            <div class="mt-1">CAP: {{$apartment->postal_code}}</div>
        </div>
    </div>

    {{-- Apartment services --}}
    <div class="row mt-5">
        <h3>Servizi appartamento</h3>
        <div class="col-12 border border-dark rounded me-2 p-2">
            <div class="row">
                @forelse ($apartment->services as $service)
                    <div class="col-2 text-center">{{$service->name}}</div>
                @empty
                    <div class="col-12">Nessun servizio in questo appartamento</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <button class="btn btn-outline-dark" onclick="history.go(-1);"><i class="fas fa-arrow-left mr-2"></i> Indietro</button>
    </div>
@endsection