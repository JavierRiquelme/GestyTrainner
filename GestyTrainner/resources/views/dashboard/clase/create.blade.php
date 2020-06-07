@extends('dashboard.master')

@section('content')
<h1>Nueva Clase:</h1>
    <form action="{{route('clase.store')}}" method="POST" enctype="multipart/form-data">
        @include('dashboard.clase.formulario')
    </form>    
@endsection