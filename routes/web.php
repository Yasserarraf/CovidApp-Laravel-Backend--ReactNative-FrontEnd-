<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/fiches','FicheController');
Route::get('fichesNT','FicheController@fichesNT')->name('fichesNT');
Route::get('fichesT','FicheController@fichesT')->name('fichesT');
Route::get('ficheT/{id}','FicheController@showFicheT')->name('showFicheT');
