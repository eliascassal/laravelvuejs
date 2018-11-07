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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/horario', 'HorarioController');
Route::resource('/docente', 'DocenteController');

Route::apiResource('/materia', 'MateriaController');
Route::resource('/aula', 'AulaController');
Route::resource('/carrera', 'CarreraController');
Route::resource('/ayudante', 'AyudanteController');
Route::apiResource('/thoughts', 'ThoughtController');

