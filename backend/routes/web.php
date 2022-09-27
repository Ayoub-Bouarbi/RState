<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;

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
    return view('layout.master');
});

Route::get('/country',[CountryController::class,'index'])->name('country.index');
Route::get('/country/create',[CountryController::class,'create'])->name('country.create');
Route::post('/country/store',[CountryController::class,'store'])->name('country.store');
Route::get('/country/{id}/edit',[CountryController::class,'edit'])->name('country.edit');
Route::post('/country/update',[CountryController::class,'update'])->name('country.update');
Route::delete('/country/{id}/destroy',[CountryController::class,'destroy'])->name('country.destroy');

Route::get('/city',[CityController::class,'index'])->name('city.index');
Route::get('/city/create',[CityController::class,'create'])->name('city.create');
Route::post('/city/store',[CityController::class,'store'])->name('city.store');
Route::get('/city/{id}/edit',[CityController::class,'edit'])->name('city.edit');
Route::post('/city/update',[CityController::class,'update'])->name('city.update');
Route::delete('/city/{id}/destroy',[CityController::class,'destroy'])->name('city.destroy');

Route::get('/propertyType',[PropertyTypeController::class,'index'])->name('propertyType.index');
Route::get('/propertyType/create',[PropertyTypeController::class,'create'])->name('propertyType.create');
Route::post('/propertyType/store',[PropertyTypeController::class,'store'])->name('propertyType.store');
Route::get('/propertyType/{id}/edit',[PropertyTypeController::class,'edit'])->name('propertyType.edit');
Route::post('/propertyType/update',[PropertyTypeController::class,'update'])->name('propertyType.update');
Route::delete('/propertyType/{id}/destroy',[PropertyTypeController::class,'destroy'])->name('propertyType.destroy');

Route::get('/agent',[AgentController::class,'index'])->name('agent.index');
Route::get('/agent/create',[AgentController::class,'create'])->name('agent.create');
Route::post('/agent/store',[AgentController::class,'store'])->name('agent.store');
Route::get('/agent/{id}/edit',[AgentController::class,'edit'])->name('agent.edit');
Route::post('/agent/update',[AgentController::class,'update'])->name('agent.update');
Route::delete('/agent/{id}/destroy',[AgentController::class,'destroy'])->name('agent.destroy');

Route::get('/property',[PropertyController::class,'index'])->name('property.index');
Route::get('/property/create',[PropertyController::class,'create'])->name('property.create');
Route::post('/property/store',[PropertyController::class,'store'])->name('property.store');
Route::get('/property/{id}/edit',[PropertyController::class,'edit'])->name('property.edit');
Route::post('/property/update',[PropertyController::class,'update'])->name('property.update');
Route::delete('/property/{id}/destroy',[PropertyController::class,'destroy'])->name('property.destroy');

Route::get('/user',[UserController::class,'index'])->name('user.index');
Route::get('/user/{id}/edit',[UserController::class,'edit'])->name('user.edit');
Route::post('/user/update',[UserController::class,'update'])->name('user.update');
Route::delete('/user/{id}/destroy',[UserController::class,'destroy'])->name('user.destroy');
