<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Prestamo
|--------------------------------------------------------------------------
*/

Route::resource('/prestamos', 'PrestamoController');
Route::post('/simular', 'PrestamoController@simular')->name('simular');
Route::get('/agregar/abono', 'PrestamoController@agregarAbono')->name('agregar_abono');
//Route::post('/abonar', 'PrestamoController@abonar')->name('abonar');
