<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
  //
  public function stripePost(Request $request)
  {

    try {
      $stripe = new \Stripe\StripeClient(
        'sk_test_51LavmzLDnGOcqCxcF3OgDXAGTEzj8oVSnCAKvbo6Fz0hCr5dfbFEurET9AfSoF8BXwfj7SCAW1vWNQKcjOicH7cf00IARQl9vC'
      );
      $res = $stripe->tokens->create([
        'card' => [
          'number' => $request->number,
          'exp_month' => $request->exp_month,
          'exp_year' => $request->exp_year,
          'cvc' => $request->cvc,
        ],

      ]);
      $stripe = new \Stripe\StripeClient(
        'sk_test_51LavmzLDnGOcqCxcF3OgDXAGTEzj8oVSnCAKvbo6Fz0hCr5dfbFEurET9AfSoF8BXwfj7SCAW1vWNQKcjOicH7cf00IARQl9vC'
      );
      $response = $stripe->charges->create([
        'amount' => $request->amount,
        'currency' => $request->currency,
        'source' => $res->id,
        'description' => $request->description,
      ]);
      return response()->json([[$response->status, "success" => true,]], 201);
    } catch (Exception $ex) {
      return response()->json([['response' => 'Error']], 500);
    }
  }
  public function subscriptionscreate(Request $request)
  {
    try {
      $stripe = new \Stripe\StripeClient(
        'sk_test_51LavmzLDnGOcqCxcF3OgDXAGTEzj8oVSnCAKvbo6Fz0hCr5dfbFEurET9AfSoF8BXwfj7SCAW1vWNQKcjOicH7cf00IARQl9vC'
      );
      $response = $stripe->subscriptions->create([
        'customer' =>'cus_MOW1GFoyekef0I',
        'items' => [
          ['price' => 10.00,          
        ],
        ],
        
      ]);
      return response()->json([[$response->status]], 200);
    } catch (Exception $ex) {
      return response()->json([['response' => 'Error']], 500);
    }
  }
  public function create_customer(Request $request)
  {
    try{
       $stripe = new \Stripe\StripeClient(
        'sk_test_51LavmzLDnGOcqCxcF3OgDXAGTEzj8oVSnCAKvbo6Fz0hCr5dfbFEurET9AfSoF8BXwfj7SCAW1vWNQKcjOicH7cf00IARQl9vC'
      );
      $stripe->customers->create([
        'name' =>  $request->name,
        'email' =>  $request->email,
        // 'currency'=>$request->currency,
        'description'=>$request->description,
        'balance'=>$request->balance
      ]);
      return response()->json([
        "Status" => 1,
        "success" => true,
        "message" => "customers created successfully.",
        // "data" =>  $response
    ]);
    }
    catch(Exception $ex)
    {
      return response()->json([
        "Status" => 0,
        "success" => false,
        "message" => "customers Not created successfully.",
        // "data" =>  $response
    ]);
    }
  }
}
