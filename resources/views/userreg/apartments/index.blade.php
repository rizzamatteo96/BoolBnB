@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')

{{-- @dd($data) --}}

<a href="{{route('userreg.apartments.create')}}" class="btn btn-secondary mt-4">Aggiungi appartamento</a>

<table class="table mt-3">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nome appartamento</th>
			<th scope="col">Città ubicazione</th>
			<th scope="col">Azioni</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($data as $item)
			<tr>
				<th scope="row">{{$item->id}}</th>
				<td>{{$item->title}}</td>
				<td>{{$item->city}}</td>
				<td>
					<a href="{{route('userreg.apartments.show', $item->id)}}" class="btn btn-primary">Dettagli</a>
					<a href="" class="btn btn-warning">Modifica</a>
					<a href="#" class="btn btn-danger">Elimina</a>
				</td>
			</tr>
		@empty
			<h2>ancora nessun appartamento</h2>
		@endforelse
		
	</tbody>
</table>
@endsection