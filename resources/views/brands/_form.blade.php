<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Nombre</label>
        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" value="{{old('name', $brand->name)}}">
        @error('name')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
<div class="form-row ">
    <div class="form-group col-md-12">
        <label for="name">Descripcion</label>
        <textarea type="text" name="description" class="form-control @error('description')is-invalid @enderror" id="description">{{old('description', $brand->description)}}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
<div class="form-row">
    <label for="description">Logo</label>
    <div class="form-group" style="text-align: center;">
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('file')is-invalid @enderror"  name="file" onchange="readURL(this);">
            <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <img id="blah" src="{{setEmpy($brand->file)}}" style="height: 200px; width: auto" alt="your image" />
        <input type="text" name="fileOld" style="display: none;" value="{{setEmpy($brand->file)}}"/>
        @error('file')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
