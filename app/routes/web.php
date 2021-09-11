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

Route::get('/vendedores', 'App\Http\Controllers\VendedorController@index');
Route::get('/vendedores/{id}', 'App\Http\Controllers\VendedorController@show');
Route::get('/vendedores/criar', 'App\Http\Controllers\VendedorController@create');
Route::post('/vendedores/criar', 'App\Http\Controllers\VendedorController@store');

Route::get('/vendas/criar', 'App\Http\Controllers\VendaController@create');
Route::post('/vendas/criar', 'App\Http\Controllers\VendaController@store');