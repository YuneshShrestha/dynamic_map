<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\SmsController;
use Illuminate\Support\Facades\Route;

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
    return view('app');
});
Route::get('/test', function () {
    return view('welcome');
});
Route::get('/autocomplete',function(){
    return view('autocomplete');
});
Route::get('/data',[DataController::class, 'index']);
Route::get('/item/{id}',[DataController::class,'item']);
Route::get('/message_form',function(){
    return view('offline_message');
});
Route::post('/message',[SmsController::class,'message']);