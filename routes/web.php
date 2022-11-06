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

$router->get('/users', '\App\Http\Controllers\UserController@index' );
$router->get('/users/trash', '\App\Http\Controllers\UserController@trash');
$router->get('/users/trash-restore/{id}', '\App\Http\Controllers\UserController@trashRestore' );
$router->delete('/users/trash-delete/{id}', '\App\Http\Controllers\UserController@trashDelete' );
$router->get('/users/{id}', '\App\Http\Controllers\UserController@show' );
$router->post('/users', '\App\Http\Controllers\UserController@store' );
$router->patch('/users/{id}', '\App\Http\Controllers\UserController@update' );
$router->delete('/users/{id}', '\App\Http\Controllers\UserController@destroy' );

$router->get('/cars', '\App\Http\Controllers\CarController@index' );
$router->get('/cars/trash', '\App\Http\Controllers\CarController@trash' );
$router->get('/cars/trash-restore/{id}', '\App\Http\Controllers\CarController@trashRestore' );
$router->delete('/cars/trash-delete/{id}', '\App\Http\Controllers\CarController@trashDelete' );
$router->get('/cars/{id}', '\App\Http\Controllers\CarController@show' );
$router->post('/cars', '\App\Http\Controllers\CarController@store' );
$router->patch('/cars/{id}', '\App\Http\Controllers\CarController@update' );
$router->delete('/cars/{id}', '\App\Http\Controllers\CarController@destroy' );

$router->get('/', function () use ($router) {
    return $router->app->version();
});
