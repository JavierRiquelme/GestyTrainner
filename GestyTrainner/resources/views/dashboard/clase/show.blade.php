@extends('dashboard.master')

@section('content')
	<h1>Vista de la Clase: {{$clase->id}}</h1>
<div class="form-row">
    <div class="form-group col-4">
        <label for="title">Título</label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{$clase->title}}">
    </div>
    <div class="form-group col-4">
        <label for="category">Categoría</label>
            <input readonly class="form-control" type="text" name="category" id="category" value="{{$clase->category->title}}">
    </div>
    <div class="form-group col-4">
        <label for="precio">Precio</label>
            <input readonly class="form-control" type="text" name="precio" id="precio" value="{{$clase->precio}}">
    </div>
        <div class="form-group col-4">
        <label for="start">Comienzo</label>
            <input readonly class="form-control" type="text" name="start" id="start" value="{{substr($clase->start, 0, 10)}}">
    </div>
    <div class="form-group col-4">
        <label for="end">Final</label>
            <input readonly class="form-control" type="text" name="end" id="end" value="{{substr($clase->end, 0, 10)}}">
    </div>
    <div class="form-group col-4">
        <label for="hora">Hora</label>
            <input readonly class="form-control" type="text" name="hora" id="hora" value="{{$clase->hora}}">
    </div>
</div>
    <div class="form-group">
        <label for="descripcion">Contenido</label>
            <textarea readonly class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" >{{$clase->descripcion}}</textarea>
    </div>
    
@endsection