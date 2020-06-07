@extends('dashboard.master')

@section('content')
<h1>Modificar Clase: {{$clase->id}}</h1>
	<form action="{{route('clase.update', $clase->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('dashboard.clase.formulario')
    </form>
@endsection