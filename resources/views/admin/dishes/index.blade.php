@extends('layouts.app')

@section('content')
@include('admin.dishes.partials.tableContainer' , ["dishes" => $dishes , "title" => "List Of My Dishes" , "dishesRoute" => "index"])
@endsection