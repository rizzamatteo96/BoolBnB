@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

	<a href="{{route('userreg.apartments.create')}}" class="btn btn-secondary mt-4">Aggiungi appartamento</a>

	@if ($data->isNotEmpty())
		<table class="table mt-3">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nome appartamento</th>
					<th scope="col">Città ubicazione</th>
					<th scope="col">Visibilità</th>
					<th scope="col">Azioni</th>
					<th scope="col">Promozioni</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($data as $key => $item)
					<tr>
					
						<th scope="row">{{$key+1}}</th>
						<td>{{$item->title}}</td>
						<td>{{$item->city}}</td>
						<td>
							@if ($item->visibility)
								<i class="far fa-eye"></i>
							@else
								<i class="far fa-eye-slash"></i>
							@endif
						</td>

						{{-- action btns --}}
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
						{{-- end action btns --}}

						{{-- Sponsorships btn --}}
						<td>

							<a href="{{route('userreg.apartment-sponsorship.create')}}" class="btn btn-success">Scopri le sposorizzazioni!</a>

						</td>
						{{-- end Sponsorships btn --}}
					</tr>
				@endforeach
				
			</tbody>
		</table>
	@else
		<h2 class="mt-3 text-center">Ancora nessun appartamento registrato</h2>
	@endif

@endsection