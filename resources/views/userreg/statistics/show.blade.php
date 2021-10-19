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


{{-- Chart section --}}
<h5>Statistiche mensili</h5>
{{-- mobile version - chart --}}
<div class="card bg-light mb-3 d-block d-lg-none">

	{{-- january --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">01</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($january)}})">
				<span class="pl-2">{{count($january)}}</span>
			</div>
		</div>
	</div>

	{{-- february --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">02</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($february)}})">
				<span class="pl-2">{{count($february)}}</span>
			</div>
		</div>
	</div>

	{{-- march --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">03</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($march)}})">
				<span class="pl-2">{{count($march)}}</span>
			</div>
		</div>
	</div>

	{{-- april --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">04</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($april)}})">
				<span class="pl-2">{{count($april)}}</span>
			</div>
		</div>
	</div>

	{{-- may --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">05</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($may)}})">
				<span class="pl-2">{{count($may)}}</span>
			</div>
		</div>
	</div>

	{{-- june --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">06</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($june)}})">
				<span class="pl-2">{{count($june)}}</span>
			</div>
		</div>
	</div>

	{{-- july --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">07</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($july)}})">
				<span class="pl-2">{{count($july)}}</span>
			</div>
		</div>
	</div>

	{{-- august --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">08</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($august)}})">
				<span class="pl-2">{{count($august)}}</span>
			</div>
		</div>
	</div>

	{{-- september --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">09</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($september)}})">
				<span class="pl-2">{{count($september)}}</span>
			</div>
		</div>
	</div>

	{{-- october --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">10</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($october)}})">
				<span class="pl-2">{{count($october)}}</span>
			</div>
		</div>
	</div>

	{{-- november --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">11</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($november)}})">
				<span class="pl-2">{{count($november)}}</span>
			</div>
		</div>
	</div>

	{{-- december --}}
	<div class="row orizontal-chart">
		<div class="col-2 text-center">12</div>
		<div class="col-10">
			<div class="border-bottom border-right border-primary ms_bg text-center" style="width: calc(90% / {{count($maxClick)}} * {{count($december)}})">
				<span class="pl-2">{{count($december)}}</span>
			</div>
		</div>
	</div>


</div>

{{-- desktop versione - chart --}}
<div class="card bg-light mb-3 d-none d-lg-block">
	<div class="row card-body align-items-end">
		
		{{-- Gennaio --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($january)}})">
			<span class="ms_fs">{{count($january)}}</span>
		</div>

		{{-- Febbraio --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($february)}})">
			<span class="ms_fs">{{count($february)}}</span>
		</div>

		{{-- Marzo --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($march)}})">
			<span class="ms_fs">{{count($march)}}</span>
		</div>

		{{-- Aprile --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($april)}})">
			<span class="ms_fs">{{count($april)}}</span>
		</div>

		{{-- Maggio --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($may)}})">
			<span class="ms_fs">{{count($may)}}</span>
		</div>

		{{-- Giugno --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($june)}})">
			<span class="ms_fs">{{count($june)}}</span>
		</div>

		{{-- Luglio --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($july)}})">
			<span class="ms_fs">{{count($july)}}</span>
		</div>

		{{-- Agosto --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($august)}})">
			<span class="ms_fs">{{count($august)}}</span>
		</div>

		{{-- Settembre --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($september)}})">
			<span class="ms_fs">{{count($september)}}</span>
		</div>

		{{-- Ottobre --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($october)}})">
			<span class="ms_fs">{{count($october)}}</span>
		</div>

		{{-- Novembre --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($november)}})">
			<span class="ms_fs">{{count($november)}}</span>
		</div>

		{{-- Dicembre --}}
		<div class="col-1 border-top border-right border-primary ms_bg text-center" style="height: calc(200px / {{count($maxClick)}} * {{count($december)}})">
			<span class="ms_fs">{{count($december)}}</span>
		</div>
	</div>
	<div class="row card-body">
		<div class="col-1 text-center">01</div>
		<div class="col-1 text-center">02</div>
		<div class="col-1 text-center">03</div>
		<div class="col-1 text-center">04</div>
		<div class="col-1 text-center">05</div>
		<div class="col-1 text-center">06</div>
		<div class="col-1 text-center">07</div>
		<div class="col-1 text-center">08</div>
		<div class="col-1 text-center">09</div>
		<div class="col-1 text-center">10</div>
		<div class="col-1 text-center">11</div>
		<div class="col-1 text-center">12</div>
	</div>
</div>
@endsection