@extends('frontblog.master')

@section('content')

  <header class="masthead" style="background-image: url('/img/mis-clases.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Mis de Clases</h1>
            <span class="subheading">Aquí están todas las Clases a las que estas apuntado</span>
          </div>
        </div>
      </div>
    </div>
  </header>

<div class="container">
  @if (session('status'))
      <div class="alert alert-success">
          {{session('status')}}
      </div>
  @endif
  
  <table class="table table-hover text-center">
    <thead class="thead-dark">
        <tr>
            <th>Título</th>
            <th>Categorías</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clases as $clase)
        <tr>
            <td>{{$clase->title}}</td>
            <td>{{$clase->category->title}}</td>
            <td>{{$clase->precio}}€</td>
            <td>
            <a href="/blog/{{$clase->id}}" class="btn btn-primary">Ver</a>

            <button class="btn btn-danger" type="button"  data-toggle="modal" data-target="#deleteModal" data-id="{{$clase->id}}">Desapuntarse</button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Seguro que quieres borrar el registro seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <form id="formDelete" method="POST" action="{{route('blog.destroy', 0)}}" data-action="{{route('blog.destroy', 0)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Borrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
      window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id') 

            action = $('#formDelete').attr('data-action').slice(0,-1)
            console.log(action);
            action += id
            
            $('#formDelete').attr('action', action)
            var modal = $(this)
            modal.find('.modal-title').text('Te vas a desapuntar de la Clase: ' + id)
        })
      }
  </script>
  <hr>
@endsection