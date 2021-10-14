@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <h2>Messaggi</h2>

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

                {{-- @if(!empty($messages_list[0])) --}}

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
                                    <form action="{{route('userreg.messages.destroy',  $item['id'])}}" method="POST" class="d-inline-block">
                                        {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare l\'elemento?')">Elimina</button>
                                    </form>
                                </td>
                                {{-- @foreach ($item as $key => $message_detail)
                                    @if ($key == 'description')
                                        <td>Messaggio: {{$message_detail}}</td>
                                    @endif
                                    @if ($key == 'email') 
                                        <td>Email: {{$message_detail}}</td>
                                    @endif
                                @endforeach --}}
                            @endif 
                        </tr>
                @endforeach
                {{-- @else --}}
                <td>Nessun messaggio ricevuto per l'appartamento</td>
                {{-- @endif --}}

            </tbody>
        </table>
            
    @endforeach

    <button class="btn btn-outline-dark mt-5" onclick="history.go(-1);">Indietro</button>


@endsection