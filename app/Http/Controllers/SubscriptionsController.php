<?php

namespace App\Http\Controllers;

use App\Models\Plan as ModelsPlan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Plan;
use App\Models\User;

class SubscriptionsController extends Controller
{
    public function registration()
    {
        return view('plans.registration');
    }
    public function registration_User(Request $request)
    {
        $inputArray = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        );
        $user = User::create($inputArray);
        if (($user)) {
            return "You have registered successfully";
        } else {
            return "You have registered  notsuccessfully";
        }
    }
    public function loginform()
    {
        return view('plans.login');
    }
    public function login(Request $request)
    {
        $useCredenials = $request->only('email', 'password');
        if (Auth::attempt($useCredenials)) {
            // return view('layouts.home');
        } else {
            return "Login Not Successfully";
        }
    }
    public function showPlanForm()
    {
        return view('plans.create');
    }
    public function savePlan(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $amount = ($request->amount * 100);
        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $request->billing_period,
                'interval_count' => $request->interval_count,
                'product' => [
                    'name' => $request->name
                ]
            ]);
           
            $test = ModelsPlan::create([
                'plan_id' => $plan->id,
                'name' => $request->name,
                'price' => $plan->amount,
                'billing_method' => $plan->interval,
                'currency' => $plan->currency,
                'interval_count' => $plan->interval_count
            ]);
        } catch (Exception $ex) {
         
        }
        return "success";
    }
    public function allPlans()
    {
        $basic = ModelsPlan::where('name', 'basic')->first();
        $professlonal = ModelsPlan::where('name', 'professlonal')->first();
        $enterprise = ModelsPlan::where('name', 'enterprise')->first();
        return view('plans.plans', compact('basic', 'professlonal', 'enterprise'));
    }
    public function checkout($planId,Request $request)
    {
        $plan = ModelsPlan::where('plan_id', $planId)->first();
        // echo "<pre>";
        // print_r($plan);die();
        if (!$plan) {
           
            return back()->withErrors([
                'message' => 'Unable to locate the plan'
            ]);
        }
        return view('plans.checkout', [
            'plan' => $plan,
        //  'intent'=> $plan->createSetupIntent()
        ]);
    }
    public function processPlan(Request $request)
    {
        return $request->all(); 
        $user = auth::user();
    //    $stripeCustomer = $user->createOrGetStripeCustomer();
        $paymentMethod = null;
        $paymentMethod = $request->payment_method;
        // if ($paymentMethod != null) {
        //     $user->addPaymentMethod($paymentMethod);    
        // }
        // $plan = $request->plan_id;
        // try{
        //     $user->newSubscription(
        //         'default', $plan
        //     )->create($paymentMethod!=null ? $paymentMethod->id:'');     
        // }catch(Exception $ex){
        //     return back()->withErrors([
        //         'error'=>'Unable to create subscription due to this issuse'.$ex->getMessage(),
        //     ]);
        // }
        $request->session()->flash('alert-success','You are subscribed to this plan');

    }
}
