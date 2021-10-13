@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <h2>Messaggi</h2>

    @foreach ($apartments as $apartment)
        <div>Nome appartamento: {{$apartment->title}}</div>
            @foreach ($messages_list as $message)
                @if (!empty($message))
                    @foreach ($message as $item)
                        @if($item['apartment_id'] == $apartment->id)
                            <ul>
                                @foreach ($item as $key => $message_detail)
                                    @if ($key == 'description')
                                        <li>Messaggio: {{$message_detail}}</li>
                                    @endif
                                    @if ($key == 'email') 
                                        <li>Email: {{$message_detail}}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif 
                    @endforeach
                @endif
            @endforeach
    @endforeach

@endsection