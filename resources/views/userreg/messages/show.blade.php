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

    <button class="btn btn-outline-dark mb-2" onclick="history.go(-1);"><i class="fas fa-arrow-left mr-2"></i> Indietro</button>

    <button type="button" class="btn btn-danger d-md-none mb-2" data-toggle="modal" data-target="#exampleModal{{$message['id']}}">Elimina</button>

    {{-- pop-up --}}
    <form action="{{route('userreg.messages.destroy',  $message['id'])}}" method="POST" class="d-inline-block">
        {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
        @csrf
        @method('DELETE')
        <div class="modal fade" id="exampleModal{{$message['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$message['id']}}" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$message['id']}}">Elimina messaggio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il messaggio? Non potrai più risalire all'email di contatto.
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
                <button type="submit" class="btn btn-danger">Elimina</button>
                </div>
            </div>
            </div>
        </div>
    </form>
    {{-- end pup-up --}}


@endsection