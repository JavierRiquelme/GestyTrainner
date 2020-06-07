	//Uso de fullcalendar
	document.addEventListener('DOMContentLoaded', function() {
	        var calendarEl = document.getElementById('calendar');

	        var calendar = new FullCalendar.Calendar(calendarEl, {
	          plugins: [ 'dayGrid', 'list', 'timeGrid', 'interaction' ],

	          header: {
	          	left:'prev,next, today',
	          	center:'title',
	          	right:'dayGridMonth, timeGridWeek, timeGridDay'
	          },
	          defaultTimedEventDuration: '01:00',
   			  forceEventDuration: true,

	          dateClick:function(info){

	          	limpiarFormulario();

	          	//deshabilitar botones Modificar y Eliminar del modal
	          	$('#btnCrear').prop('disabled',false);
	          	$('#btnModificar').prop('disabled',true);
	          	$('#btnEliminar').prop('disabled',true);

	          	//añadir modal al calendario
	          	$('#modalClase').modal();

	          	//poner fecha en el formulario
	          	$('#txtFecha').val(info.dateStr);

	          },

	          eventClick:function(info){

	          	//deshabilitar botón Crear del modal
	          	$('#btnCrear').prop('disabled',true);
	          	$('#btnModificar').prop('disabled',false);
	          	$('#btnEliminar').prop('disabled',false);
	          	
	          	//creo formato de fecha para el campo txtFechaStart
	          	dia_start = (info.event.start.getDate());
	          	mes_start = (info.event.start.getMonth()+1);
	          	anyo_start = (info.event.start.getFullYear());

	          	//pongo un 0 delante en el dia y mes para formato mysql
	          	dia_start = (dia_start<10)?'0'+dia_start:dia_start;
	          	mes_start = (mes_start<10)?'0'+mes_start:mes_start;

	          	//creo formato de fecha para el campo txtFechaEnd
	          	dia_end = (info.event.end.getDate());
	          	mes_end = (info.event.end.getMonth()+1);
	          	anyo_end = (info.event.end.getFullYear());

	          	//pongo un 0 delante en el dia y mes para formato mysql
	          	dia_end = (dia_end<10)?'0'+dia_end:dia_end;
	          	mes_end = (mes_end<10)?'0'+mes_end:mes_end;

	          	//creo formato hora
	          	minutos = info.event.start.getMinutes();
	          	hora = info.event.start.getHours();
	          	
	          	//pongo un 0 delante de los minutos y la hora para formato mysql
	          	minutos = (minutos<10)?'0'+minutos:minutos;
	          	hora = (hora<10)?'0'+hora:hora;

	          	//mostrar datos de la clase en el modal
	          	$('#txtId').val(info.event.id);
	          	$('#txtHora').val(info.event.extendedProps.hora);
	          	$('#txtTitulo').val(info.event.title);
	          	$('#txtCategory').val(info.event.extendedProps.category);
	          	$('#txtDescripcion').val(info.event.extendedProps.descripcion);
	          	$('#txtPrecio').val(info.event.extendedProps.precio);
	          	$('#txtFechaStart').val(anyo_start+'-'+mes_start+'-'+dia_start);
	          	$('#txtFechaEnd').val(anyo_end+'-'+mes_end+'-'+dia_end);
	          	$('#txtColor').val(info.event.backgroundColor);

	          	$('#modalClase').modal();
	          },
	          events:url_show
	        });

	        calendar.setOption('locale','es');

	        calendar.render();

	        //añadir evento click al botón Crear
	        $('#btnCrear').click(function(){
	        	objClase = recogerDatosClase('POST');
	        	enviarDatosClase('', objClase);
	        });

	        //añadir evento click al botón Eliminar
	        $('#btnEliminar').click(function(){
	        	objClase = recogerDatosClase('DELETE');
	        	enviarDatosClase('/'+$('#txtId').val(), objClase);
	        });

	       	//añadir evento click al botón Modificar
	        $('#btnModificar').click(function(){
	        	objClase = recogerDatosClase('PUT');
	        	enviarDatosClase('/'+$('#txtId').val(), objClase);
	        });

	        //recoger datos del formuario modalClase
	        function recogerDatosClase(method){

	        	nuevaClase={
	        		id:$('#txtId').val(),
	        		title:$('#txtTitulo').val(),
	        		user_id:$('#txtUserId').val(),
	        		category_id:$('#txtCategory option:selected').val(),
	        		descripcion:$('#txtDescripcion').val(),
	        		precio:$('#txtPrecio').val(),
	        		image:'700x300.png',	
	        		hora:$('#txtHora').val(),
	        		color:$('#txtColor').val(),
	        		textcolor:'#000000',
	        		start:$('#txtFechaStart').val()+' '+$('#txtHora').val(),
	        		end:$('#txtFechaEnd').val()+' '+$('#txtHora').val(),
	        		created_at:$('#txtCreated').val(),
	        		updated_at:$('#txtUpdated').val(),

	        		'_token':$("meta[name='csrf-token']").attr('content'),
	        		'_method':method
	        	}

	        	return nuevaClase;
	        }

	        //enviar datos a la función store de ClaseController
	        function enviarDatosClase(accion, objClase){

	        	$.ajax({
	        		type:'POST',
	        		url:url_+accion,
	        		data:objClase
	        	})
	        	.done(function(msg){
	        		
	        		//actualiza el calendario cuando inserto información
	        		$('#modalClase').modal('toggle');
	        		calendar.refetchEvents();
	        	})
	        	.fail(function(jqXHR, textStatus){
	        		alert(textStatus);
	        	});
	        }

	    function limpiarFormulario(){

	        $('#txtId').val('');
	        $('#txtHora').val('');
	        $('#txtTitulo').val('');
	        $('#txtCategory').val('');
	        $('#txtDescripcion').val('');
	        $('#txtPrecio').val('');
	        $('#txtColor').val('');	
	    }
	    });