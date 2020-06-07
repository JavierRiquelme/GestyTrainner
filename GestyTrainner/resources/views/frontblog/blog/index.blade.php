@extends('frontblog.master')

@section('content')

  <header class="masthead" style="background-image: url('/img/blog.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Blog de Clases</h1>
            <span class="subheading">Encuentra la Clase dirigida que se ajuste a tus necesidades</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      @foreach($clases as $clase)
        @if($clase->posted == 'si')
      <div class="col-lg-8 col-md-10 mx-auto">
        <img class="card-img-top" src="{{asset('/images/'.$clase->image)}}" alt="Card image cap">
        <div class="post-preview">
          <a href="/blog/{{$clase->id}}">
            <h2 class="post-title">
              {{$clase->title}}
            </h2>
            <h3 class="post-subtitle">
              {!!$clase->descripcion!!}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <b>{{$clase->user->name}}</b>
            on {{substr($clase->end, 0, 10)}}</p>
        </div>
        <hr>
      </div>
        @endif
      @endforeach
    </div>

    {{$clases->appends(
    [
        'start' => request('start'),
        'search' => request('search'),
    ]
    )->links()}}
    
  </div>
  <hr>
@endsection