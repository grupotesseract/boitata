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
    $trabalhosRecentes =  \App\Models\TrabalhoRecente::orderBy('ordem')->get();
    $motion =  \App\Models\Motion::ativo()->get()->first();
    $isMobile = \Agent::isMobile() || \Agent::isTablet();
    $primeiroEditorial = \App\Models\Editorial::primeiro()->first();
    $segundoEditorial = \App\Models\Editorial::segundo()->first();

    return view('welcome')->with([
        'trabalhosRecentes' => $trabalhosRecentes,
        'motion' => $motion,
        'isMobile' => $isMobile,
        'primeiroEditorial' => $primeiroEditorial,
        'segundoEditorial' => $segundoEditorial
    ]);

});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'HomeController@index');

Route::resource('fotos', 'FotoController');
Route::resource('trabalhoRecentes', 'TrabalhoRecenteController');
Route::resource('categorias', 'CategoriaController');
Route::resource('motions', 'MotionController');
Route::resource('editorials', 'EditorialController');

