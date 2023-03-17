@extends('layouts.app')
@section('title', $restaurant->name)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('info-message'))
        <div class="col-12">
            <div class="alert alert-{{session('alert')}}">
                {{session('info-message')}}
            </div>
        </div>
        @endif
        <div class="col-md-6 col-sm-12">
            <div class="card text-center">
                <div class="card-header d-flex justify-content-between">
                    <p class="d-inline m-0">
                        @forelse ($restaurant->types as $type)
                        <span class="badge rounded-pill" style="background-color: {{$type->color}}">{{ $type->title }}</span>
                    @empty
                    <span class="badge rounded-pill bg-secondary">No Type</span>
                    @endforelse
                    </p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$restaurant->name}}</h5>
                    <div class="card-img">
                        @if (str_starts_with($restaurant->img_path, 'http'))
                        <img src=" {{$restaurant->img_path}}"
                        @else
                        <img src="{{asset('storage/'. $restaurant->img_path)}}"
                        @endif
                        alt="preview of {{$restaurant->name}}" class="img-fluid">
                    </div>
                    <p class="card-body">Address: <span>{{$restaurant->address}}</span></p>
                        <div class="text-center">
                            <a href="{{route('admin.restaurants.index')}}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                    <div class="card-footer text-muted">
                    {{$restaurant->VAT}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection