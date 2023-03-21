@extends('layouts.app')
@section('title', '403 | Accesso non autorizzato')
@section('content')
@include('errors.partials.error', ['code' => '403', 'info_message' => 'Accesso non autorizzato.'])
@endsection