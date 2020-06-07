
        @csrf

        <div class="form-group">
            <label for="title">Título</label>
                <input class="form-control" type="text" name="title" id="title" value="{{old('title', $clase->title)}}">
            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
<div class="form-row">
        <div class="form-group col-3">
            <label for="category_id">Categoría</label>
            <select  class="form-control" name="category_id" id="category_id">
                @foreach ($categories as $title => $id)
                 <option {{$clase->category_id == $id ? 'selected="selected"' : ''}} value="{{$id}}">{{$title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-3">
            <label for="precio">Precio</label>
                <input class="form-control" type="text" name="precio" id="precio" value="{{old('precio', $clase->precio)}}">
            @error('precio')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-3">
            <label for="hora">Hora</label>
                <input class="form-control" type="time" name="hora" id="hora" value="{{old('hora', $clase->hora)}}">
            @error('hora')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-3">
            <label for="start">Comienzo</label>
                <input class="form-control" type="date" name="start" id="start" value="{{old('start', substr($clase->start, 0, 10))}}">
            @error('star')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-3">
            <label for="end">Final</label>
                <input class="form-control" type="date" name="end" id="end" value="{{old('end', substr($clase->end, 0, 10))}}">
            @error('end')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group col-3">
            <label for="color">Color</label>
                <input class="form-control" type="color" name="color" id="color" value="{{old('color', $clase->color)}}">
        </div>
        <div class="form-group col-3">
            <label for="textcolor">Color del Texto</label>
                <input class="form-control" type="color" name="textcolor" rows="10" value="{{old('textcolor', $clase->textcolor)}}">
        </div>
        <div class="form-group">
            <label for="posted">Posteado</label>
            <select  class="form-control" name="posted" id="posted">
                <option value="no">No</option>
                <option value="si" {{$clase->posted == 'si' ? 'selected="selected"' : ''}}>Sí</option>
            </select>
        </div>
</div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old('descripcion', $clase->descripcion)}}</textarea>
            @error('descripcion')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="row mt-3">
                <div class="col">
                    <label for="image">Imagen cabecera</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                    <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
        </div>
        <input type="hidden" id="token" value="{{csrf_token()}}">
        <input type="submit" value="Enviar" class="btn btn-primary mt-3">