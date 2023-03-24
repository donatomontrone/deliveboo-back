
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="fill col-lg-5 d-none d-lg-block bg-dish-image">
                        <img id="image-preview" src="{{ asset('storage/' . $dish->img_path) }}" alt="">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                @if (Route::currentRouteName() === 'admin.dishes.create')
                                <h1 class="h4 text-gray-900 mb-4">Crea il tuo piatto</h1>
                                @else
                                <h1 class="h4 text-gray-900 mb-4">Modifica il tuo piatto</h1>
                                @endif
                            </div>
                                <form id="form" class="user" action="{{ route($routeName, $dish) }}" method="POST" enctype="multipart/form-data" class="py-3">
                                    @csrf
                                    @method($method)

                                <div class="form-group row">

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="dishName" placeholder="Nome piatto &ast;" name="name" value="{{old('name', $dish->name)}}">
                                                @error('name')
                                                    <div class="invalid-feedback px-2">
                                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="nameError" class="invalid-feedback"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            
                                            <select class="custom-select border-5" name="category_id" id="category-select">
                                                <option value=""  selected>Seleziona categoria &ast;</option>
                                                @foreach ($categories as $category)
                                                <option value="{{$category->id}}" @if(Route::currentRouteName() === 'admin.dishes.create') @else {{ old('category_id', $dish->category_id) ==  $category->id ? 'selected' : '' }} @endif> 
                                                    {{ $category->title }}
                                                </option>
                                                @endforeach 
                                            </select> 
                                            @error('category_id')
                                                    <div class="invalid-feedback px-2">
                                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="categoryError" class="invalid-feedback"></div>
                                        </div>
                                </div>
                                
                                    
                            
                                <div class="form-group">
                                    <textarea name="description" minlength="5" id="dishDescription" placeholder="Descrizione" class="form-control form-control-user rounded-5" rows="3">{{old('description', $dish->description)}}</textarea> 
                                            @error('description')
                                                <div class="invalid-feedback px-2">
                                                    <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                                </div>
                                            @enderror 
                                </div>

                                    {{--   immagine --}}

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="input_container form-control-user">
                                            <input onchange="showImageDish(event)" type="file" id="fileUpload" class=" @error('img_path') is-invalid @enderror" name="img_path">
                                        </div>
                                            @error('img_path')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="dishIngredients" placeholder="Ingredienti &ast;" name="ingredients" value="{{old('ingredients', $dish->ingredients)}}">               
                                                @error('ingredients')
                                                    <div class="invalid-feedback px-2">
                                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                                    </div>
                                                @enderror 
                                                <div id="ingredientsError" class="invalid-feedback"></div>
                                        </div>
                                </div>
                                
                                    



                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input step=".01" type="number" min="0" max="999.99" maxlength="5"  class="form-control form-control-user" id="dishPrice" placeholder="Prezzo &ast;" name="price" value="{{old('price', $dish->price)}}">
                                                @error('price')
                                                    <div class="invalid-feedback px-2">
                                                        <i class="fa-solid fa-circle-exclamation pe-1"></i>{{ $message }}
                                                    </div>
                                                @enderror
                                                <div id="priceError" class="invalid-feedback"></div>
                                    </div>

                                        <div class="col-sm-6">
                                                    
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="dishVisible" name="is_visible" value="1" required @checked(old('is_visible', $dish->is_visible))>
                                                        <label class="form-check-label" for="dishVisible">
                                                            Visibile
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" id="not_visible" name="is_visible" value="0" required @checked(!old('is_visible', $dish->is_visible))>
                                                        <label class="form-check-label" for="dish-notVisible">
                                                            Non Visibile
                                                        </label>
                                                    </div>
                                                    
                                    
                                        </div>
                                </div>

                                    
                                            <button type="submit" class="btn btn-primary btn-user btn-block mt-3">
                                                Salva
                                            </button>
                                

                            </form>
                        </div>
                        <p class="small text-success text-end pe-4">
                            &ast; Campi obbligatori.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImageDish(event) {
            const replaceImage = document.getElementById('image-preview');
            replaceImage.src = URL.createObjectURL(event.target.files[0]);

            const removeImage = document.querySelector('.fill');
            removeImage.classList.remove('bg-dish-image');
        }
    </script>