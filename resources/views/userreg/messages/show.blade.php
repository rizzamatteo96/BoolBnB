@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <div class="card bg-light mb-3">
        <div class="card-header">Appartamento: {{$apartment->title}}</div>
        <div class="card-body">
          <h5 class="card-title">Messaggio da: {{$message->email}}</h5>
          <p class="card-text">Messaggio: {{$message->description}}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">Inviato il: {{$message->created_at}}</small>
        </div>
    </div>

    <button class="btn btn-outline-dark mt-5" onclick="history.go(-1);"><i class="fas fa-arrow-left mr-2"></i> Indietro</button>


@endsection