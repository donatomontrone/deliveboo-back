<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Lista dei piatti</h2></div>

                <div class="card-body">
                    <form action="{{ route($routeName, $dish) }}" method="POST" enctype="multipart/form-data" class="py-3">
                        @csrf
                        @method($method)
                    
                        <div class="mb-4 row">
                            <label for="dishName" class="col-md-4 col-form-label text-md-right">Nome &ast;</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="dishName" required minlength="3" maxlength="40" placeholder="Insert name of dish" maxlength="40" name="name" value="{{old('name', $dish->name)}}">
                                {{--inserisco l'errore sotto al singolo input--}}  
                                @error('name')
                                    <div class="invalid-feedback px-2">
                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>       
                        </div>

                        <div class="mb-4 row">
                            <label for="dishImg" class="col-md-4 col-form-label text-md-right">Immagine</label>

                            <div class="col-md-6">
                                <input id="dishImg" type="file" class="form-control @error('img_path') is-invalid @enderror" name="img_path" value="{{ old('img_path') }}" placeholder="Insert the image of dish">
    
                                @error('img_path')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="dishName" class="col-md-4 col-form-label text-md-right">Categoria &ast;</label>
                            <div class="col-md-6 ">
                                <select class="form-select" name="category_id" id="category-select" required >
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id', $category->category_id) ==  $category->id ? 'selected' : '' }}> 
                                        {{ $category->title }}
                                    </option>
                                    @endforeach 
                                </select>    
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="dishDescription" class="col-md-4 col-form-label text-md-right">Descrizione</label>
                            <div class="col-md-6">
                                <textarea name="description" minlength="5" id="dishDescription" placeholder="Insert description" class="form-control">{{old('description', $dish->description)}}</textarea>               
                                @error('description')
                                    <div class="invalid-feedback px-2">
                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                    </div>
                                @enderror           
                            </div>       
                        </div>

                        <div class="mb-4 row">
                            <label for="dishIngredients" class="col-md-4 col-form-label text-md-right">Ingredienti &ast;</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="dishIngredients" required minlength="2" maxlength="255" placeholder="Insert all ingredients" name="ingredients" value="{{old('ingredients', $dish->ingredients)}}">               
                                @error('ingredients')
                                    <div class="invalid-feedback px-2">
                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                    </div>
                                @enderror                
                            </div>       
                        </div>

                        <div class="mb-4 row">
                            <label for="dishPrice" class="col-md-4 col-form-label text-md-right">Prezzo</label>
                            <div class="col-md-6">
                                <input step=".01" type="number" min="0" max="999.99" maxlength="5"  class="form-control" required id="dishPrice" placeholder="Insert price of the dish" name="price" value="{{old('price', $dish->price)}}">
                                @error('price')
                                    <div class="invalid-feedback px-2">
                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                    </div>
                                @enderror                
                            </div>       
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-3">
                                <label for="dishVisible">Visibile</label class='col-form-label'>
                                <div class="col-md-6">
                                    <input type="radio" id="dishVisible" name="is_visible" value="1" required @checked (old('is_visible', $dish->is_visible))/>    
                                </div>      
                            </div> 
                            <div class="col-md-3">
                                <label for="dish-notVisible" class="col-form-label">Non visibile</label>
                                <div class="col-md-6">
                                    <input type="radio" id="not_visible" name="is_visible" value="0" required @checked (!old('is_visible', $dish->is_visible))>
                                </div>     
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Invia</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
