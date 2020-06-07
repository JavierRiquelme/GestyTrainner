@extends('frontblog.master')

@section('content')

<header class="masthead" style="background-image: url('/img/categorias.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Categorías</h1>
            <span class="subheading">Encuentra tú categoría favorita</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
    <div class="container">
      <div class="row">
        @foreach($categories as $category)
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('/images/'.$category->image)}}" alt="">
          <div class="card-body">
            <h4 class="card-title">{{$category->title}}</h4>
            <p class="card-text">{!!$category->descripcion!!}</p>
          </div>
          <div class="card-footer">
            <a href="{{route('clases-category', $category)}}" class="btn btn-primary">Clases</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <hr>

@endsection