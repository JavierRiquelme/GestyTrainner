@extends('dashboard.master')

@section('content')
<h1>Crear Categoría:</h1>
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @include('dashboard.category.formulario')
    </form>
    
@endsection