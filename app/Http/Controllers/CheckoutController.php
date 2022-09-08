<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function checkout()
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51LV7pkSH57xVYKyiZtg7LokhKyBZ2Z06d556AYm5r08tKnJbzCLPTz0eFd0G7wDL7kgsRJyRLD52rXVEBpolzuEX00Mm5YKogc');

        		
		$amount = 200;
		$amount *= 200;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;



		return view('checkout.credit-card',compact('intent'));

    }
    
    public function afterPayment()
    {
        echo 'Payment Received, Thanks you for using our services.';
    }
}
