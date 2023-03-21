@extends('layouts.app')
@section('title', '404 | Pagina non trovata')
@section('content')
@include('errors.partials.error', ['code' => '404', 'info_message' => 'Pagina non trovata.'])
@endsection