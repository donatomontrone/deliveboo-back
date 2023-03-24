@extends('layouts.app')
@section('scripts')
@vite(['resources/js/dishes-client-validation.js'])
@endsection
@section('content')
@include('admin.dishes.partials.form', [ 'method' => 'POST', 'routeName' => 'admin.dishes.store'])
@endsection