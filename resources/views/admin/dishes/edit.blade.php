@extends('layouts.app')
@section('content')
@include('admin.dishes.partials.form', [ 'method' => 'PUT', 'routeName' => 'admin.dishes.update'])
@endsection