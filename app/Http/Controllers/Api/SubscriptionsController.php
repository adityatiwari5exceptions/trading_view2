<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Plans1;
use Illuminate\Support\Facades\Validator;

class SubscriptionsController extends Controller
{
    public function listSubscriptions($id = null)
    {
        $plan = $id ? Plan::select(
            "id",
            "plan_name",
            "billing_method",
            "interval_count",
            "price",
            "currency"
        )->find($id) :
            Plan::select("id", "plan_name", "billing_method", "interval_count", "price", "currency")
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
    /**createPlan Api */
    public function createPlan(Request $request)
    {
        $input = $request->all();
        $rules = array(
            'plan_name' => 'required',
            'billing_method' => 'required',
            'interval_count' => 'required',
            'price' => 'required|integer|min:0',
            'currency' => 'required',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $Plan = Plan::create($input);
        if ($Plan) {
            return response()->json([
                "Status" => 1,
                "success" => true,
                "message" => "Plan created successfully.",
                "data" =>  $Plan
            ]);
        } else {
            return response()->json([
                "Status" => 0,
                "success" => false,
                "message" => "Plan created Not successfully.",
                "data" =>  $Plan
            ]);
        }
    }

    /**Update api in Plan */
    public function upDatePlan(Request $request, $id)
    {
        $plan =  Plan::find($id);
        $plan->update($request->all());
        if ($plan) {
            return response()->json([
                "Status" => 1,
                "success" => true,
                "message" => "Plan Update successfully.",
                "data" =>  $plan
            ]);
        } else {
            return response()->json([
                "Status" => 0,
                "success" => false,
                "message" => "Plan Update Not successfully.",
                "data" =>  $plan
            ]);
        }
    }

    /** Delete api* */
    public  function deletePlan($id)
    {
        $plan = Plan::find($id);
        $result = $plan->delete();
        if ($result) {
            return response()->json([
                "Status" => 1,
                "success" => true,
                "message" => "Plan deletePlan successfully.",
                "data" =>  $result,
            ]);
        } else {
            return response()->json([
                "Status" => 0,
                "success" => true,
                "message" => "Plan delete Not successfully.",
                "data" =>  $result,
            ]);
        }
    }
}
