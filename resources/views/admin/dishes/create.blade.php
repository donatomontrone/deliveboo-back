@extends('layouts.app')
@section('content')
@include('admin.dishes.partials.form', [ 'method' => 'POST', 'routeName' => 'admin.dishes.store'])
@endsection