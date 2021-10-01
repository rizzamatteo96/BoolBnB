@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">Welcome in BoolBNB {{$username}}</p>

                    <div class="row justify-content-around">
                        <a href="{{route('userreg.apartments.index')}}" class="btn btn-primary">Vai alla pagina utente registrato</a>
                        <a href="#" class="btn btn-primary">Vai alla pagina utente amministratore</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
