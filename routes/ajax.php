<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas Ajax
|--------------------------------------------------------------------------|
*/

Route::get('/cargar_ciudades', 'AjaxController@ciudades')->name('cargar_ciudades');
Route::get('/cargar_areas', 'AjaxController@areas')->name('cargar_areas');

