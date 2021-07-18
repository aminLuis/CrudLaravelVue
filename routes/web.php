<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Route::get('/home', 'ProductosController@index')->name('home');

Route::get('/home', function(){
   return view('producto.listado');
});

Route::resource('producto', ProductosController::class);
