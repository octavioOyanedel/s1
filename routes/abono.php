<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Abono
|--------------------------------------------------------------------------|
*/

Route::resource('/abonos', 'AbonoController');
Route::get('/abono', 'AbonoController@abono')->name('abono');