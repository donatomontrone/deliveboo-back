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
                            <form class="user" method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">@csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nome">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="surname" type="text" class="form-control form-control-user @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" placeholder="Cognome">
                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                    </div>


                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma password">
                                        </div>
                                    
                                </div>


                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4 pt-4">Aggiungi il tuo ristorante</h1>
                                        </div>



                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantName" type="text" class="form-control form-control-user @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="name" minlength="3" maxlength="100" placeholder="Nome Ristorante">
                                                @error('restaurant_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>

                                        <div class="col-sm-6">
                                            <input id="restaurantAddress" type="text" class="form-control form-control-user @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" required minlength="6" maxlength="255" placeholder="Indirizzo">
                                                @error('restaurant_address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                        </div>
                                    </div>

                              
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input id="restaurantVat" type="text" class="form-control form-control-user @error('VAT') is-invalid @enderror" name="VAT" value="{{ old('VAT') }}" required minlength="11" maxlength="11" placeholder="Partita IVA" >
                                                @error('VAT')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                    </div>

                               

                                    <div class="col-sm-6">

                                        <div class="input_container form-control-user">
                                            <input type="file" id="fileUpload">
                                        </div>
                                        
{{--                                             <input id="restaurantImg" type="file" class="form-control form-control-user my-form-control-user @error('restaurant_img_path') is-invalid @enderror" name="restaurant_img_path" value="{{ old('restaurant_img_path') }}">
 --}}                                           
                                                    @error('restaurant_img_path')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                </div>



                                        <div class="form-group col-lg-4 p-2">

                                            @foreach ($types as $type)
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="typeCheck" value="{{$type->id}}" name="types[]">
                                                    <label class="form-check-label" for="typeCheck">{{$type->title}}</label>
                                                </div>
                                            @endforeach

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
                </div>
            </div>
        </div>
    </div>
@endsection