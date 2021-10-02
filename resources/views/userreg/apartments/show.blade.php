@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')
    {{-- @dd($apartment) --}}

    <div class="row mt-5">
        <div class="col-10">
            {{-- Apartment title and description --}}
            <h2>{{$apartment->title}}</h2>
            <div>
                {{$apartment->description}}
            </div>
        </div>

        <div class="col-2">
            {{-- Apartment image --}}
            <img src="https://picsum.photos/200/300" alt="{{$apartment->title}}">
        </div>
    </div>

    {{-- Apartment details --}}
    <h3 class="mt-5">Dettagli appartamento</h3>
    <div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Numero di stanze: {{$apartment->n_rooms}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Numero di letti: {{$apartment->n_beds}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Numero di bagni: {{$apartment->n_bathrooms}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Numero di metri quadri: {{$apartment->n_square_meters}}</div>
    </div>    

    {{-- Apartment address --}}
    <h3 class="mt-5">Indirizzo appartamento</h3>
    <div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Città: {{$apartment->city}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Via: {{$apartment->address}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">Numero civico: {{$apartment->house_num}}</div>
        <div class="d-inline-block border border-dark rounded me-2 p-2">CAP: {{$apartment->postal_code}}</div>
    </div>

@endsection