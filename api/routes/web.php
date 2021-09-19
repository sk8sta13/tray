<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->post('meutoken', 'TokenController@gerarToken');

$router->group(['prefix' => 'vendedores', 'middleware' => 'auth'], function() use($router) {
    $router->get('', 'VendedorController@index');
    $router->get('{id}', 'VendedorController@show');
    $router->post('', 'VendedorController@store');
    $router->put('{id}', 'VendedorController@update');
    $router->delete('{id}', 'VendedorController@destroy');
});

$router->group(['prefix' => 'vendas', 'middleware' => 'auth'], function() use($router) {
    $router->post('', 'VendaController@store');
});