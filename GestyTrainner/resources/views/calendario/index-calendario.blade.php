@extends('dashboard.master')

@section('script')
	
	<!--Enlaces css. y js. fullcalendar Base-->
	<link href="{{asset('fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
    <link href="{{asset('fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
	
    <script src="{{asset('fullcalendar/packages/core/main.js')}}"></script>
    <script src="{{asset('fullcalendar/packages/daygrid/main.js')}}"></script>
    <script src="{{asset('fullcalendar/packages/interaction/main.js')}}"></script>

	<!--Enlaces Plugins fullcalendar-->
	<link href="{{asset('fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
	<link href="{{asset('fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />

	<script src="{{asset('fullcalendar/packages/list/main.js')}}"></script>
	<script src="{{asset('fullcalendar/packages/timegrid/main.js')}}"></script>

	<script>
		var url_ = "{{url('/calendario/index_calendario')}}";
		var url_show = "{{url('/calendario/show_calendario')}}";
	</script>

	<script src="{{asset('js/calendario.js')}}"></script>

@endsection

@section('content')

	<div class="modal fade" id="modalClase" tabindex="-1" role="dialog" aria-labelledby="modalLabelClase" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="modalLabelClase">Datos de la Clase</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form>
	        	<div class="form-row">
	        		<div class="d-none">
	        			<label for="txtId">ID:</label>
	        			<input type="text" name="txtId" id="txtId">
	        			<label for="txtUserId">User id:</label>
	        			<input type="text" name="txtUserId" id="txtUserId" class="form-control" value="{{auth()->user()->id}}">
	        		</div>
	        		<div class="form-group col-md-5">
	        			<label for="txtFechaStart">Fecha inicio:</label>
	        			<input type="date" name="txtFechaStart" id="txtFechaStart" class="form-control">
	        		</div>
	        		<div class="form-group col-md-5">
	        			<label for="txtFechaEnd">Fecha final:</label>
	        			<input type="date" name="txtFechaEnd" id="txtFechaEnd" class="form-control">
	        		</div>
	        		<div class="form-group col-md-6">
	        			<label for="txtTitulo">Título:</label>
	        			<input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
	        		</div>
	        		<div class="form-group col-md-5">
	        			<label for="txtHora">Hora:</label>
	        			<input type="time" min="07:00" max="22:00" name="txtHora" id="txtHora" class="form-control">
	        		</div>
	        		<div class="form-group col-md-5">
			            <label for="txtCategory">Categoría</label>
			            <select  class="form-control" name="txtCategory" id="txtCategory">
			                @foreach ($categories as $title => $id)
			                 <option selected="selected" value="{{$id}}">{{$title}}</option>
			                @endforeach
			            </select>
			        </div>
			        <div class="form-group col-md-4">
	        			<label for="txtPrecio">Precio:</label>
	        			<input type="text" name="txtPrecio" id="txtPrecio" class="form-control">
	        		</div>
	        		<div class="form-group col-md-12">
	        			<label for="txtDescripcion">Descripción:</label>
	        			<textarea name="txtDescripcion" id="txtDescripcion" class="form-control" cols="30" rows="4"></textarea>
	        		</div>
	        		<div class="form-group col-md-4">
	        			<label for="txtColor">Color:</label>
	        			<input type="color" name="txtColor" id="txtColor" class="form-control">
	        		</div>
	        	</div>
		      	</div>
		    </form>
		    
	      <div class="modal-footer">
	      	<button type="button" class="btn btn-success" id="btnCrear">Crear</button>
	      	<button type="button" class="btn btn-primary" id="btnModificar">Modificar</button>
	      	<button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
	      	<button type="button" data-dismiss="modal" class="btn btn-secondary" id="btnCancelar">Cancelar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div id='calendar'></div>

@endsection
