@extends('dashboard.master')

@section('content')
<h1>Modificar Usuario: {{$user->id}}</h1>
<form action="{{route('user.update', $user->id)}}" method="POST">
    @method('PUT')
    @include('dashboard.user.formulario', ['pasw' => false])
</form>
@endsection