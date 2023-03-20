@extends('layouts.app')
@section('title', '404 | Page Not Found')
@section('content')
@include('errors.partials.error', ['code' => '404'])
@endsection