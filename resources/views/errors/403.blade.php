@extends('layouts.app')
@section('title', '403 |' . $exception->getMessage())
@section('content')
@include('errors.partials.error', ['code' => '403', 'info_message' => 'Accesso non autorizzato.'])
@endsection