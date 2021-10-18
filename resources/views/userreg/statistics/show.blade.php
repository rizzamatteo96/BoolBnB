@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

<div class="card bg-light mb-3">
	<div class="card-header">Appartamento: {{$apartment->title}}</div>
	<div class="card-body">
		<h5 class="card-title">Statistiche appartamento</h5>
		<p class="card-text">L'appartamento è stato visualizzato {{count($statistics)}} volte</p>
	</div>
</div>

<div class="card bg-light mb-3">
	<div class="row card-body">
		{{-- Gennaio --}}
		<div class="col-1 border border-primary"></div>

		{{-- Febbraio --}}
		<div class="col-1 border border-primary"></div>

		{{-- Marzo --}}
		<div class="col-1 border border-primary"></div>

		{{-- Aprile --}}
		<div class="col-1 border border-primary"></div>

		{{-- Maggio --}}
		<div class="col-1 border border-primary"></div>

		{{-- Giugno --}}
		<div class="col-1 border border-primary"></div>

		{{-- Luglio --}}
		<div class="col-1 border border-primary"></div>

		{{-- Agosto --}}
		<div class="col-1 border border-primary"></div>

		{{-- Settembre --}}
		<div class="col-1 border border-primary"></div>

		{{-- Ottobre --}}
		<div class="col-1 border border-primary"></div>

		{{-- Novembre --}}
		<div class="col-1 border border-primary"></div>

		{{-- Dicembre --}}
		<div class="col-1 border border-primary"></div>
	</div>
	<div class="row card-body">
		<div class="col-1">Gen</div>
		<div class="col-1">Feb</div>
		<div class="col-1">Mar</div>
		<div class="col-1">Apr</div>
		<div class="col-1">Mag</div>
		<div class="col-1">Giu</div>
		<div class="col-1">Lug</div>
		<div class="col-1">Ago</div>
		<div class="col-1">Set</div>
		<div class="col-1">Ott</div>
		<div class="col-1">Nov</div>
		<div class="col-1">Dic</div>
	</div>
</div>

@endsection