@extends('layouts.app')
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
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="surname" type="text" class="form-control form-control-user @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Cognome &ast;">
                                            @error('surname')
                                            <div class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email &ast;">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password &ast;">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>


                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="password-confirm" type="password" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma password &ast;">
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    
                                </div>

                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4 pt-4">Aggiungi il tuo ristorante</h1>
                                        </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantName" type="text" class="form-control form-control-user @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="name" minlength="3" maxlength="100" placeholder="Nome Ristorante &ast;">
                                                @error('restaurant_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <input id="restaurantAddress" type="text" class="form-control form-control-user @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" required minlength="6" maxlength="255" placeholder="Indirizzo &ast;">
                                                @error('restaurant_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantVat" type="text" class="form-control form-control-user @error('VAT') is-invalid @enderror" name="VAT" value="{{ old('VAT') }}" required pattern="[0-9]+" minlength="11" maxlength="11" placeholder="Partita IVA &ast;" >
                                                @error('VAT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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


                                        <div class="form-group col-12 mt-4">
                                            <p class="small mb-1">Tipi di cucina &ast;</p>
                                            <div class="card d-inline-block rounded-5 p-2">
                                                @foreach ($types as $type)
                                                    <div class="form-check form-check-inline form-control-user p-1">
                                                        <input class="form-check-input" type="checkbox" id="typeCheck-{{$type->id}}" value="{{$type->id}}" name="types[]" required>
                                                        <label class="form-check-label" for="typeCheck-{{$type->id}}">{{$type->title}}</label>
                                                    </div>
                                                    @endforeach
                                                        @error('types')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        @enderror
                                            </div>
                                        </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrati
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">
                                                    Password dimenticata?
                                                </a>
                                                @endif
                            </div>
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