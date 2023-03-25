@extends('layouts.app')

@section('scripts')
    @vite(['resources/js/popupOnDelete.js'])
@endsection



@section('content')

<div class="container-fluid">

                    
                    <div class="d-sm-flex align-items-start flex-column mb-2">
                        <h1 class="h3 mb-2 text-gray-800">{{$dish->name}}</h1>
                        <p class="text-success">Il tuo ristorante: <strong class="text-dark">{{$dish->restaurant->name}}</strong></p>
                    </div>


                    <div class="row">

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Immagine piatto</h6>
                                </div>
                                <div class="card-body text-center">
                                    @if ($dish->img_path)   
                                                @if ($dish->isAnUrl())
                                                    <img src="{{ $dish->img_path }}"
                                                    @else
                                                    <img src="{{ asset("storage/$dish->img_path") }}"
                                                @endif
                                                @else{
                                                    <img src="https://images.prismic.io/deliveroo-restaurants/21d4d272-1706-40a4-b34a-1352c704938e_photography-noodles.jpg" 
                                                }
                                            @endif
                                    dishs        alt="{{ $dish->title }} image" class="img-fluid">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Dettagli Piatto</h6>
                                </div>
                                <div class="card-body">
                                    <p class="text-success">Nome: <strong class="text-dark">{{ $dish->name }}</strong></p>
                                    <p class="text-success">Categoria: <strong class="text-dark">{{$dish->category->title}}</strong></p>
                                    <p class="text-success">Descrizione: <strong class="text-dark">{{$dish->description}}</strong></p>
                                    <p class="text-success">Ingredienti: <strong class="text-dark">{{$dish->ingredients}}</strong></p>
                                    <p class="text-success">Prezzo: <strong class="text-dark">{{$dish->price}}&euro;</strong></p>
                                </div>
                            </div>

                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-success">Azioni</h6>
                                </div>

                                <div class="card-body d-flex align-items-center">

                                    <a href="{{route('admin.dishes.index' , $dish->slug)}}" class="bg-transparent border-0 p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="42" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                                        </svg>
                                    </a>

                                    <a href="{{route('admin.dishes.edit' , $dish->slug)}}" class="bg-transparent border-0 p-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="54" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                    </a>
                                    


                                    <form class="delete" action="{{route('admin.dishes.destroy' , $dish->slug)}}" method="POST" data-form-destroy data-element-name = '{{$dish->title}}' >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent border-0 p-2" title="delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="40" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                        </svg>
                                    </button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
