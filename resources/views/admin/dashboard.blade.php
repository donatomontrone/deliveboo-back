@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="user-name">
                <h2>Ciao, {{Auth::user()->name }} {{Auth::user()->surname}}</h2>
            </div>
            <div class="card">
                <div class="card-header">{{$restaurant->name}}
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="img-wrapper w-50">
                            @if (str_starts_with($restaurant->img_path, 'http'))
                            <img src=" {{$restaurant->img_path}} " class="img-fluid">
                            @else
                            <img src="{{asset('storage/'. $restaurant->img_path)}}" class="img-fluid">
                            @endif
                        </div>
                        <div class="my-buttons ps-3">
                            <a class="btn btn-outline-success" href="{{route('admin.dishes.index')}}">Visualizza piatti</a>
                            <a class="btn btn-outline-success" href="#">Visualizza ordini</a>
                        </div>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
