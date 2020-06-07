@extends('dashboard.master')

@section('content')
	<h1>Vista de el Usuario: {{$user->id}}</h1>
    <div class="form-group">
        <label for="name">Nombre</label>
            <input readonly class="form-control" type="text" name="name" id="name" value="{{$user->name}}">
            
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
            <input readonly class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
            
    </div>
    
@endsection