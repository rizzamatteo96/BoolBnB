@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <h2 class="pb-2">Messaggi</h2>

    @foreach ($apartments as $apartment)
        <table class="table mb-4">
            <thead>
              <tr>
                <th scope="col" style="width: 45%">Appartamento: {{$apartment->title}}</th>
                <th scope="col" style="width: 25%">Email di contatto</th>
                <th scope="col" style="width: 15%">Mostra</th>
                <th scope="col" style="width: 15%">Elimina</th>
              </tr>
            </thead>
            <tbody>

                {{-- @dump (empty($apartment->messages->all())) --}}

                {{-- if the apartment hasn't messages return no message --}}
                @if (empty($apartment->messages->all()))
                    <tr>
                        <td>Nessun messaggio</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif

                @foreach ($messages_list as $key => $message)

                    @foreach ($message as $item)
                        <tr>
                            @if($item['apartment_id'] == $apartment->id)
                                <td>Messaggio: {{$item['description']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>
                                    <a href="{{route('userreg.messages.show', $item['id'])}}" class="btn btn-primary">Dettagli</a>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Elimina</button>

                                    {{-- pop-up --}}
                                    <form action="{{route('userreg.messages.destroy',  $item['id'])}}" method="POST" class="d-inline-block">
                                        {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Elimina messaggio</h5>
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
                                </td>

                            @endif
                        </tr>
                    @endforeach

                @endforeach

            </tbody>
        </table>
            
    @endforeach

    <button class="btn btn-outline-dark mt-5" onclick="history.go(-1);"><i class="fas fa-arrow-left mr-2"></i> Indietro</button>


@endsection