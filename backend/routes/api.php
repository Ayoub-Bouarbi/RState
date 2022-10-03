<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\MeetingController;
use Illuminate\Support\Facades\Route;

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


Route::controller(AuthController::class)->group(function(){
    Route::post('login','login');
    Route::post('register','register');
    Route::get('logout','logout');
});

Route::get('/properties',[PropertyController::class,'properties']);
Route::get('/property/{slug}',[PropertyController::class,'propertyDetails']);
Route::post('/meeting',[MeetingController::class,'set_meeting']);
Route::get('/my-meetings/{id}',[MeetingController::class,'meetings_by_user']);
Route::delete('/delete-meeting/{id}',[MeetingController::class,'delete_meeting']);
