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
    return view('home');
 })->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/////////////////// USUARIOS //////////////////////////
Route::resource('/users', 'UserController');
Route::delete('/users/borrar', 'UserController@destroy');
////////////////// PROYECTOS ////////////////////////////////
Route::resource('/projects', 'ProyectosController');
Route::get('/projects/{id}/nuevaTarea', 'ProyectosController@nuevaTarea');
Route::post('/projects/createTarea', 'ProyectosController@store');
Route::delete('/projects/borrar', 'ProyectosController@destroy');
Route::get('/projects/{id}/nuevaTareaEdit', 'ProyectosController@editTarea');
Route::post('/projects/update', 'ProyectosController@update');

////////////////// HITOS ///////////////////////////////////////////
Route::prefix('hitos')->group(function() {
    Route::get('/', 'HitosController@index');
    Route::get('/tablahitos', 'HitosController@tablahitos');
    Route::get('/create', 'HitosController@create');
    Route::post('/create', 'HitosController@store');
    Route::delete('/borrar', 'HitosController@destroy');
    Route::get('/{id}/edit', 'HitosController@edit');
    Route::post('/update', 'HitosController@update');
});
//////////////////////// GRUPOS ///////////////////////////////
Route::prefix('grupos')->group(function() {
    Route::get('/', 'GruposController@index');
    Route::get('/tablagrupos', 'GruposController@tablagrupos');
    Route::get('/create', 'GruposController@create');
    Route::post('/create', 'GruposController@store');
    Route::delete('/borrar', 'GruposController@destroy');
    Route::get('/{id}/edit', 'GruposController@edit');
    Route::post('/update', 'GruposController@update');
});
