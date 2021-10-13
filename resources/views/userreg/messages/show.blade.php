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

@endsection