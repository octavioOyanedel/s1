<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de Prestamo
|--------------------------------------------------------------------------
*/

Route::resource('/prestamos', 'PrestamoController');
Route::post('/simular', 'PrestamoController@simular')->name('simular');
Route::get('/abono', 'PrestamoController@abono')->name('abono');
Route::post('/abonar', 'PrestamoController@abonar')->name('abonar');
