@extends('layouts.app')

@section('dashboard')
    <nav class="col-2 sidebar py-5">
        <div class="sidebar-sticky">
            <ul class="nav flex-column border border-secondary rounded rounded-1 dashboard">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">
                        <i class="fas fa-home"></i>
                        Apartments
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">
                        <i class="fas fa-envelope-open-text"></i>
                        Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="#">
                        <i class="fas fa-signal"></i>
                        Statistics
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

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

                    {{-- <p class="text-center">Welcome in BoolBNB {{$username}}</p> --}}
                    <p class="text-center">Welcome in BoolBNB</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
