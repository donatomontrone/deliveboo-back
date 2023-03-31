@extends('layouts.app')

@section('content')

<div class="container-fluid">

                    
                    <div class="d-sm-flex align-items-start flex-column mb-2">
                        <h1 class="h3 mb-2 text-gray-800">Dettaglio ordine N.{{$order->id}}</h1>
                    </div>


                    <div class="row justify-content-center">

                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">{{$order->date}}</h6>
                                    <h6 class="m-0 font-weight-bold @if($order->status == 'Ordine effettuato') text-success @else text-danger @endif"> {{$order->status}}</h6>
                                </div>
                                
                                <div class="card-body">
                                    <h4>
                                        Dettaglio cliente:
                                    </h4>
                                    <p class="text-success">Nome: <strong class="text-dark">{{ $order->costumer_name }}</strong></p>
                                    <p class="text-success">Mail: <strong class="text-dark">{{$order->costumer_mail}}</strong></p>
                                    <p class="text-success">Indirizzo di spedizione: <strong class="text-dark">{{$order->costumer_address}}</strong></p>
                                    <p class="text-success">Telefono: <strong class="text-dark">{{$order->costumer_phone}}</strong></p>
                                    <p class="text-success">Totale ordine: <strong class="text-dark">{{$order->total_price}}&euro;</strong></p>
                                            {{-- @dump($item) --}}
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('admin.orders.index')}}" class="bg-transparent border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="42" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                        </svg>
                    </a>
@endsection
