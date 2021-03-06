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

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('auth.login');
});

$router->post('import', 'ImportController@import')->name('import');

Auth::routes();

Route::resource('campa','CampaController');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/lista', 'HomeController@lista')->name('lista');
Route::get('/mostrar/{squema}', 'HomeController@mostrar')->name('mostrar');
