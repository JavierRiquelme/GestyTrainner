@extends('dashboard.master')

@section('content')
<h1>Contactos</h1>
<table class="table table-hover text-center">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Creación</th>
            <th>Actualización</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->created_at->format('d-m-Y')}}</td>
            <td>{{$contact->updated_at->format('d-m-Y')}}</td>
            <td>
            <a href="{{route('contact.show', $contact->id)}}" class="fa fa-eye btn btn-primary"></a>
            
            <button class="fa fa-trash-alt btn btn-danger" type="button"  data-toggle="modal" data-target="#deleteModal" data-id="{{$contact->id}}"></button>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{$contacts->links()}}

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

          <form id="formDelete" method="POST" action="{{route('contact.destroy', 0)}}" data-action="{{route('contact.destroy', 0)}}">
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
            action += id
            console.log(action)
            $('#formDelete').attr('action', action)
            var modal = $(this)
            modal.find('.modal-title').text('Vas a borrar el Post: ' + id)
        })
      }
  </script>

@endsection