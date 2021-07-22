<?php

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
Route::get('logout','Auth\LoginController@logout');
Auth::routes();
Route::resource('patient','HopitalController');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('medecin','MedecinController');
Route::resource('ambulance', 'AmbulancierController');
Route::resource('Aum', 'AumController');
Route::get('patient/ajoutersoin/{patient}','HopitalController@ajoutersoin');
Route::resource('soin', 'SoinController');
