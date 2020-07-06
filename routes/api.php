<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\src\Http\Controllers\AccessTokenController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/userp','UserpController@store');
/*

*/

//Route::post('login',[AccessTokenController::class,'issueToken'])
//->middleware(['userp','throttle']);

/*

*/
Route::post('/login','UserpController@login');



Route::namespace('userp')->prefix('userp')->group(function(){

});
Route::post('/Fiche','FicheController@store');
