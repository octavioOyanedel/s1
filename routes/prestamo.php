<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Prestamo
|--------------------------------------------------------------------------
*/

Route::resource('/prestamos', 'PrestamoController');
Route::post('/simular', 'PrestamoController@simular')->name('simular');

