@extends('frontblog.master')

@section('content')

<header class="masthead" style="background-image: url('/img/post.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>{{$clase->title}}</h1>
            <h2 class="subheading">{{$clase->category->title}}</h2>
            <span class="meta">Posted by
              <a href="#">{{$clase->user->name}}</a>
              on {{substr($clase->end, 0, 10)}}</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @if (session('status'))
            <div class="alert alert-danger">
                {{session('status')}}
            </div>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>{!!$clase->descripcion!!}</p>
          <p>Precio: {{$clase->precio}}€</p>
          @if($clase->apuntado == false)
            <form action="{{ route('create_only_pay_form', $clase) }}" method="GET">
              <button type="submit" class="btn btn-primary" id="Apuntarse">Apuntarse</button>
            </form>
          @else
            <form action="{{ route('post', $clase) }}" method="GET">
              <button type="submit" class="btn btn-primary" id="Apuntarse">Apuntarse</button>
            </form>
          @endif
          <hr>
          @foreach($clase->comments as $comment)
            @if($comment->approved == 0)
              <h3>{{$comment->title}}</h3>
              <p>{!!$comment->message!!}</p>
              <blockquote class="blockquote">Comentado por {{$comment->user->name}}, el {{$comment->created_at->format('d-m-Y')}}</blockquote>
            @endif
          @endforeach
          <hr>
          
          <h2 class="section-heading">Escribe aquí tus comentarios</h2>
          <form action="{{ route('create-comment', $clase) }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Título del comentario</label><br>
                <input type="text" name="title" id="title">
                @error('title')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="descripcion">Comentario</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                @error('descripcion')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" id="Comentar">Comentar</button>
          </form>
        </div>
      </div>
    </div>
  </article>
  
  <hr>

@endsection