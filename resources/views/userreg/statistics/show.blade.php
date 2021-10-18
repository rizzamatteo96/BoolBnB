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
	<div class="row card-body align-items-end">
		
		{{-- Gennaio --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($january)}})">
			{{count($january)}}
		</div>

		{{-- Febbraio --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($february)}})">
			{{count($february)}}
		</div>

		{{-- Marzo --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($march)}})">
			{{count($march)}}
		</div>

		{{-- Aprile --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($april)}})">
			{{count($april)}}
		</div>

		{{-- Maggio --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($may)}})">
			{{count($may)}}
		</div>

		{{-- Giugno --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($june)}})">
			{{count($june)}}
		</div>

		{{-- Luglio --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($july)}})">
			{{count($july)}}
		</div>

		{{-- Agosto --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($august)}})">
			{{count($august)}}
		</div>

		{{-- Settembre --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($september)}})">
			{{count($september)}}
		</div>

		{{-- Ottobre --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($october)}})">
			{{count($october)}}
		</div>

		{{-- Novembre --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($november)}})">
			{{count($november)}}
		</div>

		{{-- Dicembre --}}
		<div class="col-1 border border-primary text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($december)}})">
			{{count($december)}}
		</div>
	</div>
	<div class="row card-body">
		<div class="col-1 text-center">Gen</div>
		<div class="col-1 text-center">Feb</div>
		<div class="col-1 text-center">Mar</div>
		<div class="col-1 text-center">Apr</div>
		<div class="col-1 text-center">Mag</div>
		<div class="col-1 text-center">Giu</div>
		<div class="col-1 text-center">Lug</div>
		<div class="col-1 text-center">Ago</div>
		<div class="col-1 text-center">Set</div>
		<div class="col-1 text-center">Ott</div>
		<div class="col-1 text-center">Nov</div>
		<div class="col-1 text-center">Dic</div>
	</div>
</div>

@endsection