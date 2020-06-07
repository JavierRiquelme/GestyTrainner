@extends('dashboard.master')

@section('content')
	<h1>Vista de la Categoría: {{$category->id}}</h1>
    <div class="form-group">
        <label for="title">Título</label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{$category->title}}">

    </div>
    <div class="form-group">
            <label for="descripcion">Descripción</label>
                <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{$category->descripcion}}</textarea>
            @error('descripcion')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    
@endsection