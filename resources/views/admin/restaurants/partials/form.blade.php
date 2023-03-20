
<form action="{{ route($route, $restaurant->slug) }}" method="POST" class="form-floating"  enctype="multipart/form-data">
    @csrf
    @method($method)
    <div class="row mb-3">
                    {{-- Restaurant Name --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" required minlength="3" maxlength="100" id="nameInput" placeholder="restaurant name" value="{{ old('name', $restaurant->name) }}" name="name">
                <label for="nameInput">Insert the restaurant name</label>
                <div id="nameInput" class="invalid-feedback">
                @error('name')
                    {{$message}}
                @enderror
                </div>
            </div>
        </div>
            {{-- Address --}}
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control  @error('address') is-invalid @enderror" id="addressInput" placeholder="restaurant address" required minlength="6" maxlength="255" value="{{ old('address', $restaurant->address) }}" name="address">
                    <label for="addressInput">Insert the address</label>
                    <div id="addressInput" class="invalid-feedback">
                    @error('address')
                        {{$message}}
                    @enderror
                    </div>
                </div>
            </div>
    <div class="row g-3">
                        {{-- Restaurant Image --}}
        <div class="col-12">
            <div class="">
                <label for="inputImgPath">Insert the image that should be displayed</label>
                <input type="file" required max="400" class="form-control @error('img_path') is-invalid @enderror" placeholder="restaurant image" id="inputImgPath" name="img_path" value="{{  old('img_path',  $restaurant->img_path) }}">
                <div id="inputImgPath" class="invalid-feedback">
                    @error('img_path')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
                        {{-- Types Checkbox --}}
        <div class="col-12">
            @foreach ($types as $type)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="typeCheck" value="{{$type->id}}" name="types[]">
                <label class="form-check-label" for="typeCheck">{{$type->title}}</label>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row my-3">
        {{-- VAT --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="text" minlength="11" maxlength="11" required class="form-control @error('VAT') is-invalid @enderror" id="vatInput" placeholder="VAT" value="{{ old('VAT', $restaurant->VAT) }}" name="VAT" >
                <label for="vatInput">Insert your VAT</label>
                <div id="vatInput" class="invalid-feedback">
                    @error('VAT')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="buttons d-flex justify-content-between mt-3">
            <a href="{{route('admin.restaurants.index')}}" class="btn btn-outline-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>
            <button type="submit" class="btn btn-outline-success"><i class="fa-regular fa-paper-plane"></i> Submit</button>
        </div>

    </div>
</form>