@extends('frontblog.master')

<style>
	/**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
</style>

@section('content')

<header class="masthead" style="background-image: url('/img/pago.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Procedimiento Pago</h1>
            <span class="subheading">La forma más facil de apuntate a tus clases.</span>
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
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
          <div class="control-group">
          	<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Clase</th>
			      <th scope="col">Categoría</th>
			      <th scope="col">Precio</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>{{$clase->title}}</td>
			      <td>{{$clase->category->title}}</td>
			      <td>{{$clase->precio}}€</td>
			    </tr>
			  </tbody>
			</table>
        
          	<form>
          		@csrf
	            <div class="form-group floating-label-form-group controls">
	              <label for="card-holder-name">Nombre</label>
	              <input type="text" class="form-control" placeholder="Nombre" id="card-holder-name" name="card-holder-name" required data-validation-required-message="por favor introduce tú nombre.">
	              @error('card-holder-name')
	                <small class="text-danger">{{$message}}</small>
	              @enderror
	            </div>
	            <input type="hidden" id="amount" value="{{$clase->precio}}00">
	            <input type="hidden" id="clase_id" value="{{$clase->id}}">
	            <input type="hidden" id="user_id" value="{{$user->id}}">
            </form>

	          </div><br><br>
				<label for="card-element">Tarjeta de crédito</label>
				<div id="card-element"></div>

				<button class="btn btn-primary mt-5 mb-5" id="card-button">
				    Pagar
				</button>
			
		</div>
	</div>
</div>
<hr>

<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Confirmación Pago</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Se ha enviado un e-mail para confirmar el pago de la clase</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('pk_test_8f5hwHqVHk3osagNYg59PuGK00hmIQnTzs');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
	const cardButton = document.getElementById('card-button');

	cardButton.addEventListener('click', async (e) => {
	    const { paymentMethod, error } = await stripe.createPaymentMethod(
	        'card', cardElement, {
	            billing_details: {name: cardHolderName.value}
	        }
	    );

	    if (error) {
	        // Display "error.message" to the user...
	    } else {
	    	
	    	// The card has been verified successfully...
	    	let parametros = {
	    		"payment_id": paymentMethod.id,
	    		"amount": $('#amount').val(), 
	    	};

	    	$.ajax({
	    		type:'GET',
	    		url: 'http://gestytrainner.test/create_only_pay',
	    		data:parametros
	    	})
	    	.done(function(resp){

	    		
	    		$('#confirmModal').modal('show');
	    		

	    		//otra llamada ajax al controlador BLogController
	    		let parametros = {
	    			"val_user_id":$('#user_id').val(),
	    			"val_clase_id":$('#clase_id').val(),
	    			"_token": $("meta[name='csrf-token']").attr("content"),
	    		}

	    		$.ajax({
		    		type:'POST',
		    		url: 'http://gestytrainner.test/frontblog/blog/insert-clase-user',
		    		data:parametros
		    	})
		    	.done(function(resp){
		    		
		    		console.log('estoy apundato');

		    	})
		    	.fail(function(jqXHR, textStatus){
		        	alert("Error: Numero "+jqXHR.status.toString()+ "Texto "+ textStatus);
		        });

	    	})
	    	.fail(function(jqXHR, textStatus){
	        	alert("Error: Numero "+jqXHR.status.toString()+ "Texto "+ textStatus);
	        });
	    }
	});
</script>

@endsection