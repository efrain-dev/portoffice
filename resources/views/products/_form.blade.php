<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name', $product->name)}}">
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Cantidad</label>
        <input type="number" name="quantity" class="form-control @error('quantity')is-invalid @enderror" id="quantity" value="{{old('quantity', $product->quantity)}}"/>
        @error('quantity')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Precio</label>
        <input type="number" name="price" class="form-control @error('price')is-invalid @enderror" id="price" value="{{old('price', $product->price)}}"/>
        @error('price')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Marca</label>
        <select name="id_brand" id="id_brand" class="custom-select  @error('id_brand')is-invalid @enderror">
            @forelse ($brand as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @empty
                <option value="0"> No hay marcas registradas</option>

            @endforelse
        </select>
        @error('id_brand')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror

    </div>
</div>

<div class="form-row">
    <label for="description">Imagen ilustrativa del producto</label>
    <div class="form-group" style="text-align: center;">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('file')is-invalid @enderror"  name="file" onchange="readURL(this);">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <img id="blah" src="{{setEmpy($product->file)}}" style="height: 200px; width: auto" alt="your image" />
        <input type="text" name="fileOld" style="display: none;" value="{{setEmpy($product->file)}}"/>
        @error('file')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
