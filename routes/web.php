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

Route::resource('categorias', 'CategoriaController')->except('show')->middleware('usuario.auth');

// Route::resource('categorias', 'CategoriaController')->only(['create','store'])->middleware('auth');
// Route::resource('categorias', 'CategoriaController')->only(['index','update','destroy','edit']);

// Route::middleware('auth')->group(function(){
//     Route::post('categorias','CategoriaController@store')->name('categorias.store');
//     Route::get('categorias/create','CategoriaController@create')->name('categorias.create');
// });

// Route::get('categorias','CategoriaController@index')->name('categorias.index');
// Route::patch('categorias','CategoriaController@update')->name('categorias.update');
// Route::delete('categorias/{categoria}','CategoriaController@destroy')->name('categorias.destroy');
// Route::get('categorias/{categoria}/show','CategoriaController@show')->name('categorias.show');
// Route::get('categorias/{categoria}/edit','CategoriaController@edit')->name('categorias.edit');


Route::resource('publicaciones', 'PublicacionController');
Route::get('publicaciones/categoria/{categoria}', 'PublicacionController@categoria')->name('publicaciones.categoria');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
