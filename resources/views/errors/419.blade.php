@extends('layouts.app')
@section('title', '419 | Richiesta scaduta')
@section('content')
@include('errors.partials.error', ['code' => '419', 'info_message' => 'Pagina scaduta.'])
@endsection