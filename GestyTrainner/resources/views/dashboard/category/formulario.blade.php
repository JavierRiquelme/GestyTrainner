
        @csrf

        <div class="form-group">
            <label for="title">Título</label>
                <input class="form-control" type="text" name="title" id="title" value="{{old('title', $category->title)}}">
            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{old('descripcion', $category->descripcion)}}</textarea>
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