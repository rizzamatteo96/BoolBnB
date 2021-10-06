@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form name="registerForm" method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>
                            </div>
                        </div>
                        {{-- end name --}}

                        {{-- lastname --}}
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"  autocomplete="lastname" autofocus>
                            </div>
                        </div>
                        {{-- end lastname --}}

                        {{-- date of birth --}}
                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}"  autocomplete="date_of_birth" autofocus>
                            </div>
                        </div>
                        {{-- end date of birth --}}

                        {{-- e-mail (needed validation) --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" onfocusout="validateEmail(email)" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- end e-mail --}}

                        {{-- password --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" onfocusout="verifyPassword(password)" name="password" required autocomplete="new-password">

                                <span id="validation-password" class="btn-outline-danger"></span>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- end password --}}

                        {{-- password confirmation --}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            
                            


                            <div class="col-md-6">
                               
                                <input id="password-confirm" type="password" class="form-control" onfocusout="verifyConfPass(password,password-confirm)" name="password_confirmation" required autocomplete="new-password">
                                
                                {{-- Add error write --}}
                                <span id="validation-ConfPass" class="btn-outline-danger"></span>

                            </div>
                        </div>
                        {{-- end password confirmation --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="verifyConfPassOnSubmit(password, confPass)" onclick="verifyPasswordOnSubmit(password)" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
