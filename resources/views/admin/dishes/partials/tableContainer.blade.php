@php
$columns=[
    [
      "name" => "id",
    ],

    [
      "name" => "restaurant_name",
    ],

    [
    "name" => "category_title",
    ],

    [
      "name" => "name",
    ],

    [
      "name" => "description",
    ],

    [
      "name" => "ingredients",
    ],

    [
      "name" => "price",
    ],

    [
      "name" => "is_visible",
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
            {{-- @if ($dishesRoute === 'index') --}}
                {{-- @if ($numOfTrashedElements)
                <a href="{{route('admin.dishes.trashed')}}" class="my_btn btn btn-outline-danger" title="{{$numOfTrashedElements>1 ? "$numOfTrashedElements trashed elements" : "1 trashed element"}}">Go to the the recycled bin</a>
                @endif --}}
                <a href="{{route('admin.dishes.create')}}" class="my_btn btn btn-outline-primary">Add a new dish +</a>
            {{-- @else
                <form class="d-inline-block" action="{{route('admin.dishes.emptyTrash')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="my_btn btn btn-outline-danger">Delete all</button>
                </form>
                <a href="{{route('admin.dishes.restoreAll')}}" class="my_btn btn btn-outline-primary">Restore All</a>
            @endif --}}
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
            <th scope="col">#Actions</th>
          </tr>
        </thead>
    
        <tbody>
          @forelse ($dishes as $dish)
            <tr>
              {{-- @dump($dish->restaurant->name) --}}
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
                  <a href="{{route('admin.dishes.show' , $dish->slug)}}" class="my_btn btn btn-primary">Show</a>
                  {{-- @if ($dishesRoute === 'index') --}}
                    <a href="{{route('admin.dishes.edit' , $dish->slug)}}" class="my_btn btn btn-dark">Edit</a>
  
                    <form class="delete" action="{{route('admin.dishes.destroy' , $dish->slug)}}" method="POST" data-form-destroy data-element-name = '{{$dish->title}}' >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="my_btn btn btn-danger" title="delete">Delete</button>
                    </form>
                  {{-- @else
                      <form action="{{route('admin.dishes.forceDelete' , $dish->slug)}}" method="POST" >
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="my_btn btn btn-danger">Delete</button>
                      </form>
                      <a href="{{route('admin.dishes.restore' , $dish->slug)}}" class="my_btn btn btn-primary">Restore</a>
                  @endif --}}
                </td>
            </tr>
          @empty
          <tr>
            <td colspan="9" class="text-center">No dishes to show </td>
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