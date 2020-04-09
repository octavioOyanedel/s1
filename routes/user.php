<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::get('/editar', 'UserController@editar')->name('editar_usuario');
Route::resource('/usuarios', 'UserController');
