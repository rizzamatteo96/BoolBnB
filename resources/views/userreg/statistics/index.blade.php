@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

	<h2>Statistiche appartamenti</h2>

	@if ($data->isNotEmpty())
		<table class="table mt-3">
			<thead>
				<tr>
					<th scope="col" class="d-none d-md-table-cell">#</th>
					<th scope="col">Nome appartamento</th>
					<th scope="col" class="d-none d-md-table-cell">Città ubicazione</th>
					<th scope="col" class="d-none d-md-table-cell">Visibilità</th>
					<th scope="col">Azioni</th>
				</tr>
			</thead>
			<tbody>

				@foreach ($data as $key => $item)
					<tr>
						{{-- row index --}}
						<th scope="row" class="d-none d-md-table-cell">{{$key+1}}</th>

						{{-- apartment title --}}
						<td>{{$item->title}}</td>

						{{-- apartment city --}}
						<td class="d-none d-md-table-cell">{{$item->city}}</td>

						{{-- apartment visibility --}}
						<td class="d-none d-md-table-cell">
							@if ($item->visibility)
								<i class="far fa-eye"></i>
							@else
								<i class="far fa-eye-slash"></i>
							@endif
						</td>

						{{-- action buttons --}}
						<td>
							<a href="{{route('userreg.statistics.show', $item->id)}}" class="btn btn-primary">Visualizza statistiche</a>
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	@else
		<h2 class="mt-3 text-center">Nessun appartamento registrato</h2>
	@endif

@endsection