@extends('layouts.app')

@section('popup')
    @vite(['resources/js/popupOnDelete.js'])
@endsection

@section('content')
<article class="card text-center">
    <div class="card-header">
            <span class="badge bg-dark">{{$dish->restaurant->name}}</span>
            <span class="badge bg-dark">{{$dish->category->title}}</span>
    </div>
    <div class="card-image my-4">
        @if ( $dish->isAnUrl())
        <img src="{{ $dish->img_path }}"
        @else
        <img src="{{ asset("storage/$dish->img_path") }}"
        @endif
dishs        alt="{{ $dish->title }} image" class="img-fluid">
    </div>
    {{-- @dump(Auth::user()->restaurant->name) --}}
    <div class="card-body">
        <h2 class="card-title">{{ $dish->name }}</h2>
        <p class="card-text">
            {{$dish->description}}
        </p>
        <div>{{$dish->ingredients}}</div>
        <span>{{$dish->price}}&euro;</span>
    </div>

    <div class="my_btn-container d-flex justify-content-center">
        <a href="{{route('admin.dishes.edit' , $dish->slug)}}" class="my_btn btn btn-dark">Modifica</a>

        <form class="delete" action="{{route('admin.dishes.destroy' , $dish->slug)}}" method="POST" data-form-destroy data-element-name = '{{$dish->title}}' >
            @csrf
            @method('DELETE')
            <button type="submit" class="my_btn btn btn-danger" title="delete">Elimina</button>
        </form>
    </div>

</article>
@endsection