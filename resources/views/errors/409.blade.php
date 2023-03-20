@extends('layouts.app')
@section('title', '409 | ' . $exception->getMessage())
@section('content')
@include('errors.partials.error', ['code' => '409', 'info_message' => 'Conflitto.'])
@endsection