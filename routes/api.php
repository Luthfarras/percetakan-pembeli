<?php

use Illuminate\Http\Request;

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

//petugas
Route::post('register', 'CustController@register');
Route::post('login', 'CustController@login');
Route::get('/', function(){
  return Auth::user()->level;
})->middleware('jwt.verify');
Route::get('user', 'CustController@getAuthenticatedUser')->middleware('jwt.verify');

//tampil
Route::get('barang', 'TampilController@barang')->middleware('jwt.verify');
Route::get('kategori', 'TampilController@kategori')->middleware('jwt.verify');
Route::get('design', 'TampilController@design')->middleware('jwt.verify');
Route::get('trans', 'TampilController@report')->middleware('jwt.verify');

//trans
Route::post('/add_tr','TransController@store')->middleware('jwt.verify');
Route::post('/add_dt','TransController@detail')->middleware('jwt.verify');
