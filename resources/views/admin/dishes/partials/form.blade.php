<form action="{{ route($routeName, $dish) }}" method="POST" enctype="multipart/form-data" class="py-3">
    @csrf
    @method($method)
    <div class="card px-5 py-3 mb-3">

        <div class="form-outline w-25 mb-3">
            <label for="name" class="form-label @error('name') is-invalid @enderror">name</label>
            <input type="text" class="form-control" id="name" placeholder="Insert name of dish" maxlength="40" name="name" value="{{old('name', $dish->name)}}">
            {{--inserisco l'errore sotto al singolo input--}}  
            @error('name')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror       
        </div>

        <div class="col-12 mb-3">
            <div class="form-check form-check-inline">
                <select class="form-select" name="category_id" id="category-select">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id', $category->category_id) ==  $category->id ? 'selected' : '' }}> 
                        {{ $category->title }}
                    </option>
                    @endforeach 
                </select>
            </div>
        </div>

        <div class="form-outline w-100 mb-3">
            <label for="description" class="form-label @error('description') is-invalid @enderror">Description</label>
            <textarea name="description" id="description" placeholder="Insert description" class="form-control">{{old('description', $dish->description)}}</textarea>               
            @error('description')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-100 mb-3">
            <label for="ingredients" class="form-label @error('ingredients') is-invalid @enderror">Ingredients</label>
            <input type="text" class="form-control" id="ingredients" placeholder="Insert all ingredients" name="ingredients" value="{{old('ingredients', $dish->ingredients)}}">               
            @error('ingredients')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <label for="price" class="form-label @error('price') is-invalid @enderror">Price</label>
            <input step=".01" type="number" class="form-control" id="price" placeholder="Insert price of the dish" name="price" value="{{old('price', $dish->price)}}">
            @error('price')
                <div class="invalid-feedback px-2">
                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                </div>
            @enderror               
        </div>

        <div class="form-outline w-25 mb-3">
            <input type="radio" id="visible" name="is_visible" value="1" @checked (old('is_visible', $dish->is_visible))/>
            <label>Visible</label>
            <input type="radio" id="not_visible" name="is_visible" value="0" @checked (!old('is_visible', $dish->is_visible))>
            <label>Not Visible</label><br>
        </div>
        {{-- TODO Rivedere i radio buttons --}}
        <button type="submit" class="btn btn-primary">Invia</button>
    </div>

</form>
