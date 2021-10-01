@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')

<table class="table mt-5">
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
					<a href="{{route('admin.apartments.show', $item->id)}}" class="btn btn-primary">Dettagli</a>
					<a href="#" class="btn btn-warning">Modifica</a>
					<a href="#" class="btn btn-danger">Elimina</a>
				</td>
			</tr>
		@empty
			<h2>ancora nessun appartamento</h2>
		@endforelse
		
	</tbody>
</table>
@endsection
