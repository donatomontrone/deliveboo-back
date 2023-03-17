@extends('layouts.app')

@section('title', 'Create New Restaurant')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <h3>Add your Restaurant</h3>
            @include('admin.restaurants.partials.form', ['route' => 'admin.restaurants.store','method' => 'POST'])
        </div>
    </div>
</div>
@endsection