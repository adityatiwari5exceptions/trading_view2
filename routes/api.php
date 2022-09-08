<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubscriptionsController;
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
Route::get('listSubscriptions/{id?}',[SubscriptionsController::class,'listSubscriptions']);
Route::post('createPlan',[SubscriptionsController::class,'createPlan']);
Route::put('upDatePlan/{id}',[SubscriptionsController::class,'upDatePlan']);
Route::delete('deletePlan/{id}',[SubscriptionsController::class,'deletePlan']);