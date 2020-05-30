<div class="form-row ">
    <div class="form-group col-md-6">
        <label for="name">Nombre</label>
        <input type="text" name="title" class="form-control @error('title')is-invalid @enderror" id="name" value="{{old('title', $projects->title)}}">
        @error('title')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputStatus">Estado</label>
        <select name="status" class="form-control @error('status')is-invalid @enderror" id="subjet" value="{{old('status', $projects->description)}}">
        <option selected>Seleccione...</option>
        <option value="Cancelado">Cancelado</option>
        <option value="Terminado">Terminado</option>
        <option value="Procesando">Procesando</option>
        </select>
        @error('status')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>

</div>
<div class="form-row">
    <div class="form-group col-md-12 ">
        <label for="description">Descripcion</label>
        <textarea name="description" class="form-control @error('description')is-invalid @enderror " id="email">{{old('description', $projects->status)}}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
</div>
