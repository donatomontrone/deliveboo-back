@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nuovo utente</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="user[name]" class="col-md-4 col-form-label text-md-right">Nome &ast;</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome &ast;</label>
                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Indirizzo e-mail &ast;</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('useremail') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="restaurantName" class="col-md-4 col-form-label text-md-right">Nome del ristorante &ast;</label>
                            <div class="col-md-6">
                                <input id="restaurantName" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="name" minlength="3" maxlength="100">
                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="restaurantAddress" class="col-md-4 col-form-label text-md-right">Indirizzo del ristorante &ast;</label>
                            <div class="col-md-6">
                                <input id="restaurantAddress" type="text" class="form-control @error('restaurant_address') is-invalid @enderror" name="restaurant_address" value="{{ old('restaurant_address') }}" required minlength="6" maxlength="255">
                                @error('restaurant_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="restaurantImg" class="col-md-4 col-form-label text-md-right">Immagine del ristorante  </label>
                            <div class="col-md-6">
                                <input id="restaurantImg" type="file" class="form-control @error('restaurant_img_path') is-invalid @enderror" name="restaurant_img_path" value="{{ old('restaurant_img_path') }}">
                                @error('restaurant_img_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="restaurantTypes" class="col-md-4 col-form-label text-md-right">Tipi di cucina &ast;</label>
                            <div class="col-md-6">
                                @foreach ($types as $type)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="typeCheck" value="{{$type->id}}" name="types[]">
                                    <label class="form-check-label" for="typeCheck">{{$type->title}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="restaurantVat" class="col-md-4 col-form-label text-md-right">Partita IVA &ast;</label>
                            <div class="col-md-6">
                                <input id="restaurantVat" type="text" class="form-control @error('VAT') is-invalid @enderror" name="VAT" value="{{ old('VAT') }}" required minlength="11" maxlength="11">
                                @error('VAT')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} &ast;</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma password &ast;</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrati
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
