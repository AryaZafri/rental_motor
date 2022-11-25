<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FrontUserController;

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

Route::post('/login', [AuthController::class, 'login']);

Route::post('admin/login',[AdminController::class, 'login']);

Route::middleware('auth:sanctum', 'abilities:admin')->group(function(){
    Route::post('admin/logout',[AdminController::class, 'logout']);
    Route::get('admin/details',[AdminController::class, 'userDetails']);
    Route::resource('motors', MotorController::class)->except('index', 'show');
    Route::resource('/rents', RentController::class)->except('store');
    Route::resource('/payments', PaymentController::class)->except('store');
});

Route::post('user/register', [UserController::class, 'register']);
Route::post('user/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum', 'abilities:frontuser')->group(function(){
    Route::post('user/logout',[AdminController::class, 'logout']);
    Route::get('user/details',[AdminController::class, 'userDetails']);
});   

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('motors', MotorController::class)->except('store', 'update', 'delete');
    Route::resource('/rents', RentController::class)->except('delete', 'index');
    Route::resource('/payments', PaymentController::class)->except('delete', 'index');
});   