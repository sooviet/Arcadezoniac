<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {

    $router->get('users', 'UserController@viewAll');
    $router->get('user/{userID}', 'UserController@view');
    $router->post('user', 'UserController@create');
    $router->post('user/{userID}', 'UserController@update');
    $router->delete('user/{userID}', 'UserController@delete');
});