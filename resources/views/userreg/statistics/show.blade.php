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
	{{-- <div class="card-footer">
			<small class="text-muted">Inviato il:</small>
	</div> --}}
</div>	

@endsection