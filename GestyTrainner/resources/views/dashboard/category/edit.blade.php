@extends('dashboard.master')

@section('content')
<h1>Modificar Categoría: {{$category->id}}</h1>
<form action="{{route('category.update', $category->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('dashboard.category.formulario')
</form>
@endsection