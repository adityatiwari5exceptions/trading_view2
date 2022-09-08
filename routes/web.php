<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CheckoutController;
use App\Models\Plan;
use Stripe\Subscription;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/***
 * 
 * Login Routing
 * 
 */

Route::get('/plans.registration',[SubscriptionsController::class,'registration']);
Route::post('/plans.User_store',[SubscriptionsController::class,'registration_User'])->name('plans.registration'); 
Route::get('/plans.login',[SubscriptionsController::class,'loginform']);
Route::post('/plans.login_View',[SubscriptionsController::class,'login'])->name('plans.login');
Route::get('/plans.create',[SubscriptionsController::class,'showPlanForm'])->name('plans.create');
Route::post('/plans.store',[SubscriptionsController::class,'savePlan'])->name('plans.store');
Route::get('/plans',[SubscriptionsController::class,'allPlans'])->name('plans.all');
Route::get('/plans/checkout/{planId}',[SubscriptionsController::class,'checkout'])->name('plans.checkout');
Route::post('/plans/process',[SubscriptionsController::class,'processPlan'])->name('plan.process');



Route::view('login','login');
Route::view('profile','profile');
Route::post('user',[UserAuthController::class,'userLogin']);


// Route::get('checkout',[CheckoutController::class,'checkout']);
// Route::post('checkout',[CheckoutController::class,'afterpayment'])->name('checkout.credit-card');
