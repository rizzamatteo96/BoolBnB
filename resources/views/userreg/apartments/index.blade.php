@extends('layouts.app')

@section('dashboard')
  @include('userreg.partials.dashboard')
@endsection

@section('content')

	<a href="{{route('userreg.apartments.create')}}" class="btn btn-secondary mt-lg-4"><i class="fas fa-plus mr-2"></i> Aggiungi appartamento</a>

	@if ($data->isNotEmpty())
		<table class="table mt-3">
			<thead>
				<tr>
					<th scope="col" class="d-none d-md-table-cell">#</th>
					<th scope="col">Nome appartamento</th>
					<th scope="col" class="d-none d-md-table-cell">Città ubicazione</th>
					<th scope="col" class="d-none d-md-table-cell">Visibilità</th>
					<th scope="col">Azioni</th>
					{{-- <th scope="col">Messaggi</th> --}}
					{{-- <th scope="col" class="d-none d-lg-table-cell">Promozioni</th> --}}
				</tr>
			</thead>
			<tbody>

				@foreach ($data as $key => $item)
				
					<tr>
					
						<th scope="row" class="d-none d-md-table-cell">{{$key+1}}</th>
						<td>{{$item->title}}</td>
						<td class="d-none d-md-table-cell">{{$item->city}}</td>
						<td class="d-none d-md-table-cell">
							@if ($item->visibility)
								<i class="far fa-eye"></i>
							@else
								<i class="far fa-eye-slash"></i>
							@endif
						</td>

						{{-- action btns --}}
						<td>
							{{-- show --}}
							<a href="{{route('userreg.apartments.show', $item->id)}}" class="btn btn-primary mb-lg-1 text-center">Dettagli</a>

							{{-- Edit --}}
							<a href="{{route('userreg.apartments.edit', $item->id)}}" class="btn btn-warning d-none d-lg-inline-block mb-lg-1 text-center">Modifica</a>
							
							{{-- delete --}}
							<form action="{{route('userreg.apartments.destroy', $item->id)}}" method="POST" class="d-inline-block text-center">
								{{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
								@csrf
								@method('DELETE')
								<div class="btn btn-danger d-none d-lg-inline-block mb-lg-1 text-center" data-toggle="modal" data-target="#deleteModal{{$item->id}}">Elimina</div>
								{{-- delete pop-up --}}
								<div class="modal fade" id="deleteModal{{$item->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$item->id}}" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="deleteModalLabel{{$item->id}}">{{$item->title}}</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											</div>
											<div class="modal-body">
												Sei sicuro di voler eliminare l'appartamento? Perderai anche tutti i messaggi e le statistiche relative all'appartamento.
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
												<button type="submit" class="btn btn-danger">Elimina</button>
											</div>
										</div>
									</div>
								</div>
							</form>
							
						</td>
						{{-- end action btns --}}

						{{-- Messages btn --}}
						{{-- <td>

							<a href="{{route('userreg.messages.index')}}" class="btn btn-success">Messaggi</a>

						</td> --}}
						{{-- end Messages btn --}}

						{{-- Sponsorships btn --}}
						{{-- <td class="d-none d-lg-table-cell">

							<a href="{{route('userreg.apartment-sponsorship.index', ['id' => $item->id])}}" class="btn btn-success">Sponsorizza</a>

						</td> --}}
						{{-- end Sponsorships btn --}}
					</tr>
				@endforeach
				
			</tbody>
		</table>

		{{-- delete pop-up --}}
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">{{$item->title}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<div class="modal-body">
						Sei sicuro di voler eliminare l'appartamento? Perderai anche tutti i messaggi e le statistiche relative all'appartamento.
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Annulla</button>
						<button type="submit" class="btn btn-danger">Elimina {{$item->id}}</button>
					</div>
				</div>
			</div>
		</div>

	@else
		<h2 class="mt-3 text-center">Ancora nessun appartamento registrato</h2>
	@endif

@endsection