@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <h2>Messaggi</h2>

    @foreach ($apartments as $apartment)
        <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 45%">Appartamento: {{$apartment->title}}</th>
                <th scope="col" style="width: 25%">Email di contatto</th>
                <th scope="col" style="width: 15%">Mostra</th>
                <th scope="col" style="width: 15%">Elimina</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($messages_list as $message)
                    @forelse ($message as $item)
                        <tr>
                            @if($item['apartment_id'] == $apartment->id)
                                <td>Messaggio: {{$item['description']}}</td>
                                <td>{{$item['email']}}</td>
                                <td></td>
                                <td></td>
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
                @endforeach

            </tbody>
        </table>
            
    @endforeach

@endsection