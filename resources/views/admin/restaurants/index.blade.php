@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @if (session('info-message'))
        <div class="col-12">
            <div class="alert alert-{{session('alert')}}">
                {{session('info-message')}}
            </div>
        </div>
        @endif
        <div class="card p-0">
            <div class="card-header">
                <div class="row">
                    <div class="col-6 text-success">
                        <h2 class="m-0">Restaurants [ {{count($restaurants)}} ]</h2>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead class="table lh-lg bg-success">
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Image</th>
                            <th scope="col" >Name </th>
                            <th scope="col">Address</th>
                            <th scope="col">VAT</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($restaurants as $restaurant)
                        <tr>
                            <th scope="row">{{$restaurant->id}}</th>
                            <td>
                                <img src="{{$restaurant->img_path}}" alt="{{$restaurant->name}} image" class="restaurant-img">
                            </td>
                            <td>{{$restaurant->name}}</td>
                            <td>{{$restaurant->address}}</td>
                            <td>{{$restaurant->VAT}}</td>
                            <td class="text-center">
                            <a href="{{route('admin.restaurants.show', $restaurant->slug)}}" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No restaurants to show </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection