@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

  <div>
    <ul>
      <li>Appartamento: {{$apartment->title}}</li>
      <li>Piano di sponsorizzazione selezionato: {{$sponsorship->type}}</li>
      <li>Prezzo: {{$sponsorship->price}}</li>
      <li>Durata: {{$sponsorship->duration}}</li>
    </ul>
    <form action="{{route('userreg.apartment-sponsorship.store')}}" method="POST" enctype="multipart/form-data">
      {{-- generate token --}}
      @csrf
      <label for="credit-card">Inserisci la tua carta di credito</label>
      <input id="credit-card" type="text">
    <button type="submit" class="btn btn-primary d-block">Conferma acquisto</button>  
  </div>

@endsection