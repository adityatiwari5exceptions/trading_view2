<?php

namespace App\Http\Controllers;

use App\Models\Plan as ModelsPlan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Plan;
use Illuminate\Support\Facades\Validator;

class PlanController extends Controller
{
  //
  public function testPlan(Request $request)
  {

    \Stripe\Stripe::setApiKey('sk_test_51LavmzLDnGOcqCxcF3OgDXAGTEzj8oVSnCAKvbo6Fz0hCr5dfbFEurET9AfSoF8BXwfj7SCAW1vWNQKcjOicH7cf00IARQl9vC');
    $input = $request->all();
    $amount = ($request->amount * 100);
    try {
      $rules = array(
        'name' => 'required',
        'billing_method' => 'required',
        'interval_count' => 'required',
        'price' => 'required|integer|min:0',
        'currency' => 'required',
      );
      $validator = Validator::make($input, $rules);
      if ($validator->fails()) {
        return $validator->errors();
      }
      $plan = Plan::create([
        'amount' =>  $request->price,
        'currency' => $request->currency,
        'interval' => $request->billing_method,
        'interval_count' => $request->interval_count,
        'product' => [
          'name' => $request->name
        ]
      ]);
      $ModelsPlan = ModelsPlan::create([
        'plan_id' => $plan->id,
        'name' => $request->name,
        'price' => $request->price,
        'billing_method' => $request->billing_method,
        'currency' => $request->currency,
        'interval_count' => $request->interval_count,
      ]);

      if ($ModelsPlan) {
        return response()->json([
          "Status" => 1,
          "success" => true,
          "message" => "Plan created successfully.",
          "data" =>  $ModelsPlan
        ]);
      } else {
        return response()->json([
          "Status" => 0,
          "success" => false,
          "message" => "Plan created Not successfully.",
          "data" =>  $ModelsPlan
        ]);
      }
    } catch (Exception $ex) {

      return response()->json($ex->getMessage());
    }

    return "success";
  }
  public function Planlist($id = null)
  {
    
    $user = Auth::user();
    if($user)
    {
      $plan = $id ? ModelsPlan::select(
        "id",
        "plan_id",
        "name",
        "billing_method",
        "interval_count",
        "price",
        "currency"
      )->find($id) :
        ModelsPlan::select(
          "id",
          "plan_id",
          "name",
          "billing_method",
          "interval_count",
          "price",
          "currency"
        )
        ->get();
      if ($plan) {
        return response()->json([
          "success" => true,
          "message" => " Data List successfully",
          "Status" => 1,
          "data" => $plan
        ]);
      } else {
        return response()->json([
          "success" => false,
          "message" => " Data  Not Found",
          "Status" => 0,
          "data" => $plan
        ]);
      }
    }
    else
    {
        return response()->json(["message"=>"user not found"]);
    }
    
  }
  public function checkout($plan_id, Request $request)
  {
    $intent = auth::user()->createSetupIntent();
    $plan = ModelsPlan::where('plan_id', $plan_id)->first();
    // if($plan)
    // {

    // }
   
   
  }
  
}
