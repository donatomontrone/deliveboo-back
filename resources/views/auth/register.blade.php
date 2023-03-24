@extends('layouts.app')
@section('scripts')
@vite(['resources/js/registration-client-validation.js'])
@endsection
@section('content')

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea il tuo utente</h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Nome &ast;">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div id="nameError" class="invalid-feedback"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="surname" type="text" class="form-control form-control-user @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}"  autocomplete="surname" placeholder="Cognome &ast;">
                                            @error('surname')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                            <div id="surnameError" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-12">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email &ast;">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div id="emailError" class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password &ast;">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>


                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="password-confirm" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password" placeholder="Conferma password &ast;">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <div id="confirmPasswordError" class="invalid-feedback"></div>
                                        </div>
                                    
                                </div>

                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4 pt-4">Aggiungi il tuo ristorante</h1>
                                        </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantName" type="text" class="form-control form-control-user @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}"  autocomplete="name" placeholder="Nome Ristorante &ast;">
                                                @error('restaurant_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div id="restaurantNameError" class="invalid-feedback"></div>
                                        </div>

                                        <div class="col-sm-6">
                                            <input id="restaurantAddress" type="text" class="form-control form-control-user @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" placeholder="Indirizzo &ast;">
                                                @error('restaurant_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div id="restaurantAddressError" class="invalid-feedback"></div>
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantVat" type="text" class="form-control form-control-user @error('VAT') is-invalid @enderror" name="VAT" value="{{ old('VAT') }}" minlength="11" maxlength="11" placeholder="Partita IVA &ast;" >
                                                @error('VAT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <div id="vatError" class="invalid-feedback"></div>
                                    </div>

                                    <div class="col-sm-6">

                                        <div class="input_container form-control-user">
                                            <input type="file" id="fileUpload" class=" @error('img_path') is-invalid @enderror" name="img_path">
                                        </div>
                                            @error('img_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>


                                        <div class="form-group row ">
                                            <div class="col-sm-6 col-md-12">
                                                <p class="small mb-1">Tipi di cucina &ast;</p>
                                                <div id="typesContainer" class="card d-inline-block input-group rounded-5 p-2">
                                                    @foreach ($types as $type)
                                                        <div class="form-check form-check-inline form-control-user p-1">
                                                            <input class="my_checkbox form-check-input" type="checkbox" id="typeCheck-{{$type->id}}" value="{{$type->id}}" name="types[]">
                                                            <label class="form-check-label" for="typeCheck-{{$type->id}}">{{$type->title}}</label>
                                                        </div>
                                                        @endforeach
                                                        @error('types')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                                </div>
                                                <div id="typesError" class="small text-danger mt-1"></div>
                                            </div>
                                        </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrati
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Hai già un account? Accedi!</a>
                            </div>
                        </div>
                    </div>
                    <p class="small text-success text-end pe-4">
                        &ast; Campi obbligatori.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection