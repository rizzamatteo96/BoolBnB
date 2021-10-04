@extends('layouts.app')

@section('dashboard')
    @include('userreg.partials.dashboard')
@endsection

@section('content')

{{-- @dd($data) --}}

<a href="{{route('userreg.apartments.create')}}" class="btn btn-secondary mt-4">Aggiungi appartamento</a>

@if (isset($data->items))
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

			@foreach ($data as $item)
				<tr>
					<th scope="row">{{$item->id}}</th>
					<td>{{$item->title}}</td>
					<td>{{$item->city}}</td>
					<td>
						<a href="{{route('userreg.apartments.show', $item->id)}}" class="btn btn-primary">Dettagli</a>
						<a href="{{route('userreg.apartments.edit', $item->id)}}" class="btn btn-warning">Modifica</a>
						<form action="{{route('userreg.apartments.destroy', $item->id)}}" method="POST" class="d-inline-block">
              {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare l\'elemento?')">Elimina</button>
            </form>
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
@else
		<h2>Ancora nessun appartamento registrato</h2>
@endif


@endsection