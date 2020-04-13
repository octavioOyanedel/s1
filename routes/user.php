<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Usuario
|--------------------------------------------------------------------------|
*/

Route::get('/editar', 'UserController@editar')->name('editar_usuario');
Route::get('/password', 'UserController@editarPassword')->name('editar_contraseña');
Route::put('/actualizar', 'UserController@updatePassword')->name('camniar_contraseña');
Route::resource('/usuarios', 'UserController');
