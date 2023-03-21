@php
$columns=[
    [
      "name" => "ID",
    ],

    [
      "name" => "Nome Ristorante",
    ],

    [
    "name" => "Categoria",
    ],

    [
      "name" => "Piatto",
    ],

    [
      "name" => "Descrizione",
    ],

    [
      "name" => "Ingredienti",
    ],

    [
      "name" => "Prezzo",
    ],

    [
      "name" => "Visibilità",
    ],
];    
@endphp

@section('popup')
  @vite(['resources/js/popupOnDelete.js'])
@endsection

@if (session('message'))
    <div class="row">
      <div class="alert alert-warning d-flex justify-content-between" role="alert">
        <strong>{{session('message')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
@endif

@if (session('message-create'))
    <div class="row">
      <div class="alert alert-success d-flex justify-content-between" role="alert">
        <strong>{{session('message-create')}}</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
@endif

<section class="card">
  <div class="card-header">
    <div class="row align-items-center">
      <div class="col-6">
        <h2 class="my_title fw-bold">{{$title}}</h2>
      </div>

      <div class="col-6">
        <div class="text-end">

                <a href="{{route('admin.dishes.create')}}" class="my_btn btn btn-outline-primary">Aggiungi piatto <i class="fa-solid fa-plus"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="container-fluid">
      <table class="table table-hover">
        <thead class="table-dark">
          <tr>
            @foreach ($columns as $col)
            <th scope="col">{{$col['name']}}</a></th>
            @endforeach
            <th scope="col">Azioni</th>
          </tr>
        </thead>
    
        <tbody>
          @forelse ($dishes as $dish)
            <tr>
                <th scope="row">{{$dish->id}}</th>
                <td>{{$dish->restaurant->name}}</td>
                <td>{{$dish->category->title}}</td>
                <td>{{$dish->name}}</td>
                <td>{{$dish->description}}</td>
                <td>{{$dish->ingredients}}</td>
                <td>{{$dish->price}}&euro;</td>
                <td>{{$dish->getABooleanFromNumber($dish->is_visible)}}</td>
                {{-- <td>
                  @forelse ($dish->technologies as $technology)
                  <div class="badge rounded rounded-pill" style="color:{{$technology->color}};background-color:{{$technology->bg_color}}">{{$technology->name}}</div>
                  @empty
                  <div>No technologies</div>
                  @endforelse
                </td> --}}
                <td>
                  <a href="{{route('admin.dishes.show' , $dish->slug)}}" class="my_btn btn btn-primary">Mostra</a>
                  {{-- @if ($dishesRoute === 'index') --}}
                    <a href="{{route('admin.dishes.edit' , $dish->slug)}}" class="my_btn btn btn-dark">Modifica</a>
  
                    <form class="delete" action="{{route('admin.dishes.destroy' , $dish->slug)}}" method="POST" data-form-destroy data-element-name = '{{$dish->title}}' >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="my_btn btn btn-danger" title="delete">Elimina</button>
                    </form>
                </td>
            </tr>
          @empty
          <tr>
            <td colspan="9" class="text-center">Nessun piatto inserito</td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>


    {{-- <div class="my_pagination-links d-flex justify-content-end">
      {{ $dishes->links() }}
    </div> --}}
  </div>
</section>