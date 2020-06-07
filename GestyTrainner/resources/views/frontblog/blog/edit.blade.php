@extends('frontblog.master')

@section('content')

<header class="masthead" style="background-image: url('/img/perfil.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Perfil</h1>
            <span class="subheading">¿Qué quieres cambiar?</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>¿Quieres cambiar algo de tú perfil? Modifique el siguiente formulario para cambiar los datos de su perfil, recuerde que luego deberá entrar en la aplicación con sus nuevas credenciales.</p>

        @if (session('status'))
              <div class="alert alert-success">
                  {{session('status')}}
              </div>
        @endif
        
        <form method="POST" action="{{route('blog.update', auth()->user())}}" name="sentMessage" id="contactForm" novalidate>
          @method('PUT')
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" placeholder="Nombre" id="name" name="name" value="{{old('name', auth()->user()->name)}}" required data-validation-required-message="por favor introduce tú nombre.">
              @error('name')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label for="email">Dirección Email</label>
              <input type="email" class="form-control" placeholder="Dirección email" id="email" name="email" value="{{old('email', auth()->user()->email)}}" required data-validation-required-message="por favor introducce tú dirección email.">
              @error('email')
                <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
          </div>
          <div class="control-group">
          </div>
          <br>
          <input type="hidden" name="user_id" id="user_id" value="2">
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Modificar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

    <hr>
@endsection