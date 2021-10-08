@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

  <h2>Sponsorizzazioni disponibili per appartamento "{{$apartment->title}}"</h2>
  <div class="row justify-content-between">
      @foreach ($sponsorships as $sponsorship)

      <div class="col mt-4">

        <div class="card text-center" style="width: 16rem;">
          <div class="card-body">
            <h5 class="card-title text-uppercase">Piano {{$sponsorship->type}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$sponsorship->duration}} h</h6>
            <p class="card-text">{{$sponsorship->price}} €</p>
            <a href="{{route('userreg.apartment-sponsorship.create', ['sponsorship-id' => $sponsorship->id], ['id' => $apartment->id])}}" class="btn btn-success rounded-pill">Acquista</a>
          </div>
        </div>

      </div>
      
    @endforeach
  </div>

  <a href="{{route('userreg.apartments.index')}}" class="btn btn-outline-dark mt-4"><i class="fas fa-arrow-left me-2"></i> Torna indietro</a>

@endsection