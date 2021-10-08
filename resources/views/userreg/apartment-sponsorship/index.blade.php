@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

    <h2>Sponsorizzazione per appartamento "{{$apartment->title}}"</h2>
    {{-- @dd($apartment) --}}
    {{-- @dd($sponsorships) --}}

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome sponsorizzazione</th>
          <th scope="col">Prezzo</th>
          <th scope="col">Durata</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($sponsorships as $sponsorship)
          <tr>
            <th scope="row">{{$sponsorship->id}}</th>
            <td>{{$sponsorship->type}}</td>
            <td>{{$sponsorship->price}} €</td>
            <td>{{$sponsorship->duration}} h</td>
            <td>
              <a href="#" class="btn btn-success">Acquista promozione</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

@endsection