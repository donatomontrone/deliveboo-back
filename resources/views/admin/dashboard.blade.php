@extends('layouts.app')

@section('content')

<div class="container-fluid">

                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ciao, {{Auth::user()->name }} {{Auth::user()->surname}}</h1>
                    </div>

                    
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                            <a class="text-white" href="{{route('admin.dishes.index')}}">Visualizza piatti</a>
                                        </div>
                                    </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                            <a class="text-white" href="{{route('admin.orders.index')}}">Visualizza ordini</a>
                                        </div>
                                    </div>
                        </div>

                        
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                            <a class="text-white" href="">Visualizza statistiche</a>
                                        </div>
                                    </div>
                            </div>
                    </div>

                    <div class="row">

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Immagine Ristorante</h6>
                                </div>
                                <div class="card-body text-center">
                                        @if (str_starts_with($restaurant->img_path, 'http'))
                                            <img src=" {{$restaurant->img_path}} " class="img-fluid">
                                            @else
                                            <img src="{{asset('storage/'. $restaurant->img_path)}}" class="img-fluid">
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Dettagli Ristorante</h6>
                                </div>
                                <div class="card-body">
                                    <p class="text-success">Nome ristorante: <strong class="text-dark">{{$restaurant->name}}</strong></p>
                                    <p class="text-success">Indirizzo: <strong class="text-dark">{{$restaurant->address}}</strong></p>
                                    <p class="text-success">Partita IVA: <strong class="text-dark">{{$restaurant->VAT}}</strong></p>
                                    @foreach ( $restaurant->types as $types )
                                        <p class="text-success">Tipo di cucina: <strong class="text-dark"> {{$types->title}} </strong></p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>




@endsection
