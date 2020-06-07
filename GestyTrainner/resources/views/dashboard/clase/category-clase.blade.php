@extends('dashboard.master')

@section('content')

      <div class="container-fluid">
        <div class="row">

      <div class="col-md-8">

        <h1 class="my-4">POST
          <small>Principal</small>
        </h1>
      
        @foreach ($clases as $clase)
          
          <div class="card mb-4">
            <img class="card-img-top" src="{{asset('/images/'.$clase->image)}}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$clase->title}}</h2>
              <p class="card-text">{!!$clase->descripcion!!}</p>
              <a href="#" class="btn btn-primary">Leer más &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posteado el {{substr($clase->end, 0, 10)}} por
              <a href="#">
              @auth
                {{$clase->user->name}}
              @endauth
            </a>
            </div>
          </div>
        
        @endforeach

        {{$clases->appends([
          'search' => request('search'),
          ]
        )->links()}}
        
      </div>

      <div class="col-md-4">

        <form action="{{ route('inicio') }}">
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" value="{{ request('search') }}" name="search" class="form-control" placeholder="Buscar...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
                </span>
              </div>
            </div>
          </div>
        </form>
        
        <div class="card my-4">
          <h5 class="card-header">Categorias</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  @foreach ($categories as $title => $id)
                  <li>
                    <a href="{{route('category-clase', $id)}}">{{$title}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
      </div>
    </div>

  </div>

@endsection
