<?php

namespace App\Http\Controllers;

use App\User;
use App\Clase;
use App\Mail\ConfirmPaymentEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function create_customer(){

    	$user = Auth::user();
    	$stripeCustomer = $user->createAsStripeCustomer();
    }

    public function payment_method_register(){

    	$user = Auth::user();
    	return view('frontblog.payment.payment_method_register', [
		    'intent' => $user->createSetupIntent()
		]);
    }

    public function payment_method_create(){

    	$user = Auth::user();
    	$user->addPaymentMethod('pm_1GimceK8d0iZDG6uyfa8W92f');
    }

    public function payment_method(){

    	$user = Auth::user();
    	$paymentMethods = $user->paymentMethods();
    }

    public function create_only_pay_form($id){

    	$user = Auth::user();
        $clase = Clase::findOrFail($id);
        Mail::to($user)->send(new ConfirmPaymentEmail);
        
    	return view('frontblog.payment.create_only_pay_form', compact('clase', 'user'));
    }

    public function create_only_pay(Request $request){

    	$user = Auth::user();
    	$stripeCharge = $user->charge($request->amount, $request->payment_id);
    }

    public function create_subscription(){

    	$user = Auth::user();
    	$paymentMethod = $user->defaultPaymentMethod();
    	$user->newSubscription('default', 'plan_HHMyN4CNGnPzV4')->create($paymentMethod->id);
    }
}
