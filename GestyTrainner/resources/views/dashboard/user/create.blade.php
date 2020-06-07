@extends('dashboard.master')

@section('content')
<h1>Crear Usuario:</h1>
    <form action="{{route('user.store')}}" method="POST">
        @include('dashboard.user.formulario', ['pasw' => true])
    </form>
    
@endsection