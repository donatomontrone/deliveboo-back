@extends('layouts.app')

@section('content')

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="user[name]" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('user[name]') is-invalid @enderror" name="user[name]" value="{{ old('user[name]') }}" required autocomplete="name">

                                @error('user[name]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('user[surname]') is-invalid @enderror" name="user[surname]" value="{{ old('user[surname]') }}" required autocomplete="surname">

                                @error('user[surname]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="user[email]" type="email" class="form-control @error('user[email]') is-invalid @enderror" name="user[email]" value="{{ old('email') }}" required autocomplete="email">

                                @error('user[email]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurantName" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant name') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="restaurantName" type="text" class="form-control @error('restaurant[name]') is-invalid @enderror" name="restaurant[name]" value="{{ old('restaurant[name]') }}" required autocomplete="name" minlength="3" maxlength="100" placeholder="Inser the name of the restaurant">

                                @error('restaurant[name]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurantAddress" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant address') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="restaurantAddress" type="text" class="form-control @error('restaurant[address]') is-invalid @enderror" name="restaurant[address]" value="{{ old('restaurant[address]') }}" placeholder="Insert the address of the restaurant" required minlength="6" maxlength="255">

                                @error('restaurant[address]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
     
                        <div class="mb-4 row">
                            <label for="restaurantImg" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant image') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="restaurantImg" type="file" class="form-control @error('restaurant[img_path]') is-invalid @enderror" name="restaurant[img_path]" value="{{ old('restaurant[img_path]') }}" required placeholder="Insert the image of restaurant">

                                @error('restaurant[img_path]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurantTypes" class="col-md-4 col-form-label text-md-right">{{ __('Cucines Types') }} &ast;</label>

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
                            <label for="restaurantVat" class="col-md-4 col-form-label text-md-right">{{ __('Restaurant VAT') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="restaurantVat" type="text" class="form-control @error('restaurant[VAT]') is-invalid @enderror" name="restaurant[VAT]" value="{{ old('restaurant[VAT]') }}" required>

                                @error('restaurant[VAT]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('user[password]') is-invalid @enderror" name="user[password]" required autocomplete="new-password">

                                @error('user[password]')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} &ast;</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
