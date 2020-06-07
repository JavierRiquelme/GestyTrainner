@extends('dashboard.master')

@section('content')
<h1>Listar Usuarios de la Clase:</h1>
<table class="table table-hover text-center">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clase->users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->rol->key}}</td>
            <td>{{$user->created_at->format('d-m-Y')}}</td>
            <td>{{$user->updated_at->format('d-m-Y')}}</td>
            <td>
            <a href="{{route('user.show', $user->id)}}" class="fa fa-eye btn btn-primary"></a>
            <a href="{{route('user.edit', $user->id)}}" class="fa fa-pencil-alt btn btn-primary"></a>

            <button class="fa fa-trash-alt btn btn-danger" type="button"  data-toggle="modal" data-target="#deleteModal" data-id="{{$user->id}}" data-clase="{{$clase->id}}"></button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

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
          
          <form id="formDelete" method="POST" action="{{route('destroy-user-clase', 0)}}" data-action="{{route('destroy-user-clase', 0)}}">
            @method('DELETE')
            @csrf
            <input type="hidden" name="clase_id" value="{{$clase->id}}">
            <button type="submit" class="btn btn-danger">Borrar</button>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script>
      window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id'); 
            var clase = button.data('clase');

            action = $('#formDelete').attr('data-action').slice(0,-1)
            action += id
            console.log(action);
            $('#formDelete').attr('action', action)
            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar de la clase '+ clase +' al Usuario: ' + id)
        })
      }
  </script>

@endsection