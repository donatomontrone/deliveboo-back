@extends('layouts.app')

@section('content')
@include('admin.dishes.partials.tableContainer' , ["dishes" => $dishes , "title" => "Lista piatti" , "dishesRoute" => "index"])
@endsection