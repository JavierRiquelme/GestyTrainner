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
            <h1>Método de pago</h1>
            <span class="subheading">This is what I do.</span>
          </div>
        </div>
      </div>
    </div>
 </header>



<!-- Stripe Elements Placeholder -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<!--<input id="card-holder-name" type="text">-->
			<div class="control-group">
	            <div class="form-group floating-label-form-group controls">
	              <label for="card-holder-name">Nombre</label>
	              <input type="text" class="form-control" placeholder="Nombre" id="card-holder-name" name="card-holder-name" required data-validation-required-message="por favor introduce tú nombre.">
	              @error('card-holder-name')
	                <small class="text-danger">{{$message}}</small>
	              @enderror
	            </div>
	          </div><br><br>
			<div id="card-element"></div>

			<button class="btn btn-primary mt-5" id="card-button" data-secret="{{ $intent->client_secret }}">
			    Registro método de pago
			</button>
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
	const clientSecret = cardButton.dataset.secret;

	cardButton.addEventListener('click', async (e) => {
	    const { setupIntent, error } = await stripe.confirmCardSetup(
	        clientSecret, {
	            payment_method: {
	                card: cardElement,
	                billing_details: { name: cardHolderName.value }
	            }
	        }
	    );

	    if (error) {
	        // Display "error.message" to the user...
	    } else {
	        // The card has been verified successfully...
	    }
	});
</script>

@endsection