<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubscriptionsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\Api\StripePaymentController;
use App\Http\Controllers\PassportController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register',[PassportController::class,'register']);
Route::post('login',[PassportController::class,'login']);
Route::middleware('auth:api')->group(function(){
    Route::get('user', [PassportController::class,'authenticatedUserDetails']);
    Route::post('stripePost',[StripePaymentController::class,'stripePost']);
    // Route::post('create_customer',[StripePaymentController::class,'create_customer']);
    Route::get('Planlist/{id?}',[PlanController::class,'Planlist']);
    Route::get('checkout/{plan_id}',[PlanController::class,'checkout']);
    
});
Route::post('subscriptionscreate',[StripePaymentController::class,'subscriptionscreate']);
Route::post('create_customer',[StripePaymentController::class,'create_customer']);
Route::post('stripePost',[StripePaymentController::class,'stripePost']);
// Route::post('testPlan',[PlanController::class,'testPlan']);
// // Route::get('Planlist/{id?}',[PlanController::class,'Planlist']);
// Route::get('checkout/{plan_id}',[PlanController::class,'checkout']);

